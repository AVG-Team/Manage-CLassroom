<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', ['title' => 'Đăng Kí - ' . config('app.name')]);
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                ...$request->validated(),
                'password' => Hash::make($request->input('password')),
                'role' => 0,
            ]);

            $token = Str::random(5) . "-". Str::uuid() . "-" . time();

            PasswordResetToken::query()->create([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now(),
                'status' => 0,
                'type' => 1,
            ]);

            UserRegisterEvent::dispatch($user, $token);

            DB::commit();

            return redirect()->route('home')
                ->with('success', 'Tạo Người Dùng Thành Công !!!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['error' => 'Tạo Người Dùng Thất Bại !!!']);
        }
    }
}
