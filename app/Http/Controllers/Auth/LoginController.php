<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    Protected AuthService $authServices;

    public  function __construct(AuthService $authService)
    {
        $this->authServices = $authService;
    }

    public function index():View
    {
        return view('auth.login', ['title' => 'Đăng Nhập - ' . config('app.name')]);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $result = $this->authServices->login($request->email, $request->password, $request->has('remember_me'));
        if ($result) {
            return redirect()->route('home')->with("success", "Đăng Nhập Thành Công");
        }

        return redirect()->back()->withInput()->withErrors(['errors' => 'Email hoặc mật khẩu không đúng']);
    }
}
