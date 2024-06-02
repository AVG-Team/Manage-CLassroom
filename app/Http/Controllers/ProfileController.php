<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile',
            [
                'user' => auth()->user(),
                'title' => 'Profile Page - ' . config('app.name'),
            ]);
    }
}
