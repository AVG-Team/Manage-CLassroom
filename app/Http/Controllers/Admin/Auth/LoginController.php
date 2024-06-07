<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login',
            [
                'title' => 'Đăng Nhập Quản Trị - ' . config('app.name'),
            ]);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $result = false;

        if (Auth::attempt(["email" => $email, "password" => $password], true))
        {
            try {
                $user = User::query()
                    ->where('email', $email)
                    ->firstOrFail();

                if ($user->role < UserRoleEnum::STAFF) {
                    return redirect()->route("home")->withErrors(['errors' => 'Bạn Không được phép truy cập vào trang này']);
                }

                Auth::login($user, true);

                $result = true;
            } catch (\Exception $e) {
            }
        }

        if ($result) {
            return redirect()->route('admin.home')->with("success", "Đăng Nhập Thành Công");
        }

        return redirect()->back()->withInput()->withErrors(['errors' => 'Email hoặc mật khẩu không đúng']);
    }
}
