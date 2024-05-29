<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function classroom()
    {
        $title = "Classroom";
        return view('user.classroom.index', ['title' => $title]);
    }
}
