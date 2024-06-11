<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function showSalary(){
        $title = 'Bảng lương';
        $user = auth()->user();
        $salaries = $user->salaries()->orderBy('created_at', 'desc')->get();
        return view('user.page.salary',['title' => $title], compact('user', 'salaries'));
    }
}
