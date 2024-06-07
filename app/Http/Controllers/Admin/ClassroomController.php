<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageUsersScribedRequest;
use App\Models\ClassroomDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function index()
    {

    }

    public function usersSubscribed()
    {
        $contentTitle = 'Danh sách người dùng đã đăng ký';
        $title = $contentTitle . ' - ' . config('app.name');
        return view('admin.classrooms.user-subscribed', [
            'title' => $title,
            'contentTitle' => $contentTitle,
        ]);
    }

    public function getTableUsersSubcribed(ManageUsersScribedRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $user = Auth::user();
        $type = $values['status'] ?? -1;
        $search = $values['search'] ?? '';

        $query = User::query();

        if (!empty($search) && strlen($search) >= 2) {
            $query->search($search);
        } else {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($type == -1) {
            if (!$isAdmin) {
                $query->where('role', '<', UserRoleEnum::STAFF);
            }
        } else if ($type == 2 && $isAdmin) {
            $query->where('role', '>=', UserRoleEnum::STAFF);
        } else {
            $query->where('role', $type);
        }

        $users = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.users.table', ['users' => $users])->render()
            ]);
        }

        return view('admin.users.table', [
            'users' => $users,
        ]);
    }
}
