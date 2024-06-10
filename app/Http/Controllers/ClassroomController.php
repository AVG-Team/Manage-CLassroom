<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Execrise;
use App\Models\UserSubscribed;
use App\Models\Notification;
use App\Http\Requests\StoreClassroomRequest;



class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::whereNotNull('teacher_id') ->where('status', '<=', 1)->get();
        $user = auth()->user();
        $title = "Classroom";
        return view('user.classroom.index', ['title' => $title], compact('classrooms', 'user'));
    }

    public function create()
    {
        $title = "Create Classroom";
        return view('user.classroom.create', ['title' => $title]);
    }

    public function showAll(){
        $classrooms = Classroom::whereNotNull('teacher_id') ->where('status', '<=', 1)->get();
        $user = auth()->user();
        $userSubscribed = UserSubscribed::all()->where('user_id', $user->uuid)->where('status', 0);
        $title = "Danh sách lớp học";
        return view('user.page.list-course', ['title' => $title], compact('classrooms', 'user', 'userSubscribed'));
    }

    public function participate()
    {
        $title = "Participate Classroom";
        $classrooms = Classroom::whereNotNull('teacher_id') ->where('status', '<=', 1)->get();
        $user = auth()->user();
        return view('user.classroom.participate', ['title' => $title], compact('classrooms', 'user'));
    }

    public function detail($id){
        $title = "Detail Classroom";
        $classrooms = Classroom::whereNotNull('teacher_id') ->where('status', '<=', 1)->get();
        $notifications = Notification::where('classroom_id', $id)->get();
        $user = auth()->user();

        $exercises = Exercise::all()->where('classroom_id', $id);

        $classroom = $user->classrooms()->where('classroom_id', $id)->first();
        if($user->role == 0){
            $classroom = $user->classrooms()->where('classroom_id', $id)->first();
        }
        if($user->role == 1){
           $classroom = $user->teacherClassrooms()->where('id', $id)->first();
        }
        return view('user.classroom.detailClassroom', ['title' => $title], compact('classroom','classrooms','user','exercises','notifications'));
    }
}
