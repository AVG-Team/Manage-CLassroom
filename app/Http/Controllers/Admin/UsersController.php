<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreUserRequest;
use App\Http\Requests\Admin\Users\UpdateUsersRequest;
use App\Http\Requests\ManageUsersRequest;
use App\Models\PasswordResetToken;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    use ResponseTrait;

    public function index(ManageUsersRequest $request)
    {
        $title = 'Quản Lý Người Dùng - ' . config('app.name');
        $contentTitle = 'Quản Lý Người Dùng';
        $tableHtml = $this->getTableUsers($request)->render();

        return view('admin.users.index', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'tableHtml' => $tableHtml,
        ]);
    }

    public function getTableUsers(ManageUsersRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $user = Auth::user();
        $type = $values['filter_type'] ?? -1;
        $isAdmin = $user->role == UserRoleEnum::ADMIN;
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

        $users = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.users.table', ['users' => $users])->render()
            ]);
        }

        return view('admin.users.table', [
            'users' => $users,
        ]);
    }

    public function getTeacher()
    {
        $teachers = User::Where('role', UserRoleEnum::TEACHER)->get();
        return response()->json($teachers);
    }

    public function getStudent()
    {
        $teachers = User::Where('role', UserRoleEnum::USER)->get();
        return response()->json($teachers);
    }

    public function create()
    {
        $title = 'Thêm Người Dùng - ' . config('app.name');
        $contentTitle = 'Thêm Người Dùng';
        return view('admin.users.create', [
            'title' => $title,
            'contentTitle' => $contentTitle,
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $values = $request->validated();
            if (!isset($values['check_generate_password'])) {
                $password = 12345678;
            } else {
                $password = Str::uuid();
            }

            $values['password'] = bcrypt($password);

            $user = User::create($values);

            $token = Str::random(5) . "-" . Str::uuid() . "-" . time();

            PasswordResetToken::query()->create([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now(),
                'status' => 0,
                'type' => 1,
            ]);

            Mail::send('email.create-user-from-admin', compact('user', 'token', 'password'), function ($email) use ($user) {
                $email->subject(config('app.name') . '- Tạo Tài Khoản Thành Công');
                $email->to($user->email, $user->name);
            });


            DB::commit();

            return redirect()->route('admin.users.index')->with('success', 'Thêm người dùng thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['errors' => 'Thêm người dùng thất bại']);
        }
    }

    public function edit(User $user)
    {
        $title = 'Sửa Người Dùng - ' . config('app.name');
        $contentTitle = 'Sửa Người Dùng';
        return view('admin.users.edit', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'user' => $user,
        ]);
    }

    public function update(UpdateUsersRequest $request, User $user)
    {
        if ($user->role == UserRoleEnum::ADMIN && Auth::user()->role != UserRoleEnum::ADMIN) {
            return redirect()->back()->withErrors(["errors" => 'Không thể cập nhật người dùng này']);
        }

        try {
            $values = $request->validated();

            $email = $values['email'];
            $userTmp = User::where('email', $email)->first();

            if ($userTmp && $userTmp->uuid != $user->uuid) {
                return redirect()->back()->withErrors(['errors' => 'Email đã tồn tại']);
            }

            $user->update($values);
            return redirect()->route('admin.users.index')->with('success', 'Cập nhật người dùng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => 'Cập nhật người dùng thất bại']);
        }
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
            return $this->successResponse([], 'Xóa người dùng thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa người dùng thất bại');
        }
    }

    public function __forceDelete(User $user)
    {
        try {
            $user->forceDelete();
            return $this->successResponse([true], 'Xóa người dùng thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa người dùng thất bại');
        }
    }
}
