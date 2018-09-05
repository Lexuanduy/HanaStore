<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    //Fetch data from order list by date period
    //Lấy dữ liệu từ danh sách đặt hàng theo khoảng thòi gian nhất định
    public function getChartDataApi()
    {
        $start_date = '2018-07-20';
        $end_date = '2018-08-25';
        $chart_data = Order::select(DB::raw('sum(totalPrice) as revenue'), DB::raw('date(created_at) as day'))
            ->whereBetween('created_at', array($start_date, $end_date))
            ->groupBy('day')
            ->orderBy('day', 'desc')
            ->get();
        return $chart_data;
    }
}
