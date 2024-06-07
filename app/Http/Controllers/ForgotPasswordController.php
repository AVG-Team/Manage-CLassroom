<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password', ['title' => 'Quên Mật Khẩu - ' . config('app.name')]);
    }
}
