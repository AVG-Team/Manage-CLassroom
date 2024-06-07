<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Execrise;
use App\Http\Requests\StoreClassroomRequest;


class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        $user = auth()->user();
        $title = "Classroom";
        return view('user.classroom.index', ['title' => $title], compact('classrooms', 'user'));
    }

    public function create()
    {
        $title = "Create Classroom";
        return view('user.classroom.create', ['title' => $title]);
    }

    public function participate()
    {
        $title = "Participate Classroom";
        $classrooms = Classroom::all();
        $user = auth()->user();
        return view('user.classroom.participate', ['title' => $title], compact('classrooms', 'user'));
    }

    public function detail($id){
        $title = "Detail Classroom";
        $classroom = Classroom::findOrFail($id);
        $user = auth()->user();
        return view('user.classroom.detailClassroom', ['title' => $title], compact('classroom', 'user'));
    }

    // public function store(StoreClassroomRequest $request){
    //     $classroom = Classroom::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'code_classroom' => $request->code_classroom,
    //         'image_path' => $request->image_path,
    //         'status' => $request->status,
    //         'price' => $request->price,
    //         'category_id' => $request->category_id,
    //     ])

    //     return redirect()->route("classroom");
    // }
}
