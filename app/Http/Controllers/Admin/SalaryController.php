<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $title = 'Quản Lý Người Dùng - ' . config('app.name');
        $contentTitle = 'Quản Lý Người Dùng';

        return view('admin.salary.index', [
            'title' => $title,
            'contentTitle' => $contentTitle,
        ]);
    }
}
