<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $title = 'Quản Lý Lương - ' . config('app.name');
        $contentTitle = 'Quản Lý Lương';

        return view('admin.salary.index', [
            'title' => $title,
            'contentTitle' => $contentTitle,
        ]);
    }

    public function getSalaryTable()
    {

    }
}
