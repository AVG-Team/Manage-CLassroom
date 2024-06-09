<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ClassroomStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\ManageOrderRequest;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;
use App\Http\Requests\Admin\UserSubscribed\StoreUserSubscribedRequest;
use App\Http\Requests\Admin\UserSubscribed\UsersSubscribedRequest;
use App\Models\Classroom;
use App\Models\Order;
use App\Models\User;
use App\Models\UserSubscribed;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    use ResponseTrait;

    public function index(ManageOrderRequest $request)
    {
        $contentTitle = "Danh Sách Học Viên Đã Đăng Ký";
        $title = $contentTitle . " - " . config('app.name');
        $tableHtml = $this->getTableOrder($request)->render();
        return view('admin.order.index',
            [
                'title' => $title,
                'contentTitle' => $contentTitle,
                'tableHtml' => $tableHtml,
            ]);
    }

    public function getTableOrder(ManageOrderRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $search = $values['search'] ?? '';
        $type = $values['type'] ?? 0;
        $status = $values['status'] ?? -1;

        $query = Order::with(['user' => function ($query) {
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
            case 3:
                $query->where('code_order', 'like', '%' . $search . '%');
                break;
        }

        if ($status != -1) {
            $query->where('status', $status);
        }

        $orders = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.order.table', ['orders' => $orders])->render()
            ]);
        }

        return view('admin.order.table', [
            'orders' => $orders,
        ]);
    }

    public function approve(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
        ]);

        $value = $request->get('ids');

        try {
            $emails = UserSubscribed::whereIn('id', $value)->where('status', 0)
                ->join('users', 'user_subscribed.user_id', '=', 'users.uuid')
                ->pluck('users.email', 'users.name')->unique();

            if (! $emails->isEmpty()) {
                Mail::send('email.AddUserToClassroom', [], function ($email) use ($emails) {
                    $email->subject(config('app.name') . '- Chúc Mừng Bạn Đã Được Thêm Vào Lớp Học');

                    foreach ($emails as $name => $address) {
                        $email->bcc($address, $name);
                    }
                });
            }
            UserSubscribed::whereIn('id', $value)->update(['status' => 1]);


            $classroomIds = UserSubscribed::whereIn('user_subscribed.id', $value)->where('classrooms.status', 0)
                ->join('classrooms', 'user_subscribed.classroom_id', '=', 'classrooms.id')
                ->pluck('classrooms.id')->unique();

            foreach ($classroomIds as $id) {
                $count = UserSubscribed::query()->where('classroom_id', $id)->count();
                $classroom = Classroom::query()->where('id', $id)->first();
                if ($classroom->capacity <= $count) {
                    $classroom->update(['status' => 1]);
                }
            }

            return $this->successResponse([], 'Duyệt thành Công');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function edit(Order $order)
    {
        $contentTitle = "Chỉnh Sửa Học Viên Đăng Ký";
        $title = $contentTitle . " - " . config('app.name');

        return view('admin.order.edit', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'order' => $order,
        ]);
    }

    public function update(UpdateOrderRequest $request ,Order $order)
    {
        try {
            $values = $request->validated();

            $order->update($values);
            return redirect()->route('admin.orders.index')->with('success', 'Sửa Học Viên Đăng Kí Thành Công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => 'Sửa Học Viên Đăng Kí Thất Bại']);
        }
    }

    public function delete(Order $order)
    {
        try {
            UserSubscribed::query()
                ->where('user_id', $order->user_id)
                ->where("classroom_id", $order->classroom_id)
                ->first()
                ->delete();

            $count = UserSubscribed::query()->where('classroom_id', $order->classroom_id)->count();
            $classroom = Classroom::query()->where('id', $order->classroom_id)->first();
            if ($classroom->capacity > $count) {
                $classroom->update(['status' => 0]);
            }
            
            $order->delete();
            return redirect()->route('admin.orders.index')->with('success', 'Xóa Học Viên Đăng Kí Thành Công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => 'Xóa người dùng thất bại']);
        }
    }

    public function __forceDelete(Order $order)
    {
        try {
            $order->forceDelete();
            return redirect()->route('admin.orders.index')->with('success', 'Xóa Học Viên Đăng Kí Thành Công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => 'Xóa người dùng thất bại']);
        }
    }
}
