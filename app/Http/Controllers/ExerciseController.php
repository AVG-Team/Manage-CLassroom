<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Execrise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index($id)
    {
        $classrooms = Classroom::all();
        $exercise = Execrise::FindOrFail($id);
        $user = auth()->user();
        $title = "Exercise";
        return view('user.classroom.detailExercise', ['title' => $title], compact('classrooms', 'user','exercise'));
    }
}
