<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

            Auth::login($user, true);

            UserRegisterEvent::dispatch($user);

            DB::commit();

            return redirect()->route('home')
                ->with('success', 'Create new user successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            dd($e->getMessage());
        }
    }
}
