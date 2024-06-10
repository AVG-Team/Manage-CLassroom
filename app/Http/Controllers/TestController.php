<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserSubscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{
    public function __invoke()
    {
        $name = "Doanh Số";

        $data = Order::query()
            ->selectRaw('DAY(created_at) as day, SUM(total) as total_sum')
            ->whereMonth('created_at', now()->month)
            ->whereNull('deleted_at')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $days = $data->pluck('day');
        $totals = $data->pluck('total_sum');

        return Response::json([
            'name' => $name,
            'day' => $days,
            'total' => $totals,
        ]);
    }
}
