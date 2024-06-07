<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use App\Models\User;
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
        $email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember_me');
        $result = false;

        if (Auth::attempt(["email" => $email, "password" => $password], $remember))
        {
            try {
                $user = User::query()
                    ->where('email', $email)
                    ->firstOrFail();

                Auth::login($user, $remember);

                $result = true;
            } catch (\Exception $e) {
            }
        }

        if ($result) {
            return redirect()->route('home')->with("success", "Đăng Nhập Thành Công");
        }

        return redirect()->back()->withInput()->withErrors(['errors' => 'Email hoặc mật khẩu không đúng']);
    }
}
