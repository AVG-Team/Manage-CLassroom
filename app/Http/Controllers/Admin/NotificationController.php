<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notification\ManageNotificationRequest;
use App\Http\Requests\Admin\Order\ManageOrderRequest;
use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(ManageNotificationRequest $request)
    {
        $contentTitle = "Danh Sách Thông Báo Trên Hệ Thống";
        $title = $contentTitle . " - " . config('app.name');
        $tableHtml = $this->getTableNotify($request)->render();
        return view('admin.notification.index',
            [
                'title' => $title,
                'contentTitle' => $contentTitle,
                'tableHtml' => $tableHtml,
            ]);
    }

    public function getTableNotify(ManageNotificationRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $search = $values['search'] ?? '';
        $type = $values['type'] ?? 0;
        $status = $values['status'] ?? -1;

        $query = Notification::with(['user' => function ($query) {
            $query->withTrashed();
        }, 'classroom' => function ($query) {
            $query->withTrashed();
        }]);

        switch ($type) {
            case 0:
                if (!empty($search) && strlen($search) >= 2) {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->search($search);
                    });
                } else {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                }
                break;
            case 1:
                if (!empty($search) && strlen($search) >= 2) {
                    $query->whereHas('classroom', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->search($search);
                    });
                } else {
                    $query->whereHas('classroom', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->where('title', 'like', '%' . $search . '%');
                    });
                }
                break;
            case 2:
                $query->whereHas('classroom', function ($query) use ($search) {
                    $query->withTrashed();
                    $query->where('code_classroom', 'like', '%' . $search . '%');
                });
                break;
        }

        if ($status != -1) {
            $query->where('status', $status);
        }

        $notifications = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.notification.table', ['orders' => $notifications])->render()
            ]);
        }

        return view('admin.notification.table', [
            'notifications' => $notifications,
        ]);
    }
}
