<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Exercise;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke()
    {
        $contentTitle = "Trang Chủ";
        $title = $contentTitle . " - " . config('app.name');
        $totalUsers = User::where('role', '<=', UserRoleEnum::USER())->count();
        $totalProducts = Classroom::where('status', '>=' , 1)->count();
        $exercises = Exercise::all()->count();
        $orders = Order::all()->sum('total');

        $classrooms = Classroom::with('teacher', 'orders', 'users')->get();
        $listClassrooms = [];
        foreach ($classrooms as $classroom) {
            $listClassrooms[] = [
                'id' => $classroom->id,
                'title' => $classroom->title,
                'teacher' => $classroom->teacher?->name,
                'total_orders' => $classroom->orders->sum('total'),
                'total_users' => $classroom->users->count(),
            ];
        }
        usort($listClassrooms, function($a, $b) {
            return $b['total_users'] <=> $a['total_users'];
        });

        $listClassrooms = array_slice($listClassrooms, 0, 10);
        return view('admin.index', compact('totalUsers', 'totalProducts', 'orders', 'exercises' ,'contentTitle', 'title', 'listClassrooms'));
    }
}
