<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $title = 'Welcome to Laravel 8';
        return view('user.home.index', ['title' => $title]);
    }
}
