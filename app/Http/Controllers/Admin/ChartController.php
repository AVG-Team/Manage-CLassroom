<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ChartController extends Controller
{
    public function chartRevenue(Request $request)
    {
        $request->validate([
           'type' => 'required|integer|in:0,1,2',
        ]);

        $type = $request->get('type');
        $name = "Doanh Số";

        if ($type === '0') {
            $data = Order::query()
                ->selectRaw('DAY(created_at) as day, SUM(total) as total_sum')
                ->whereMonth('created_at', now()->month)
                ->whereNull('deleted_at')
                ->groupBy('day')
                ->orderBy('day')
                ->get();

            $labels = $data->pluck('day');
        } else {
            $data = Order::query()
                ->selectRaw('Month(created_at) as month, SUM(total) as total_sum')
                ->whereYear('created_at', now()->year)
                ->whereNull('deleted_at')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $labels = $data->pluck('month');
        }
        $totals = $data->pluck('total_sum');

        return Response::json([
            'name' => $name,
            'labels' => $labels,
            'total' => $totals,
        ]);
    }
}
