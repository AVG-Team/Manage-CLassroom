<?php

namespace App\Http\Controllers;

use App\Models\UserSubscribed;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        $value = UserSubscribed::all()->pluck('id');
        $classroomIds = UserSubscribed::whereIn('user_subscribed.id', $value)->where('classrooms.status', 0)
            ->join('classrooms', 'user_subscribed.classroom_id', '=', 'classrooms.id')
            ->pluck('classrooms.id')->unique();

        return $classrooms;
    }
}
