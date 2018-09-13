<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ChartController extends Controller
{

    //Fetch data from order list by date period
    //Lấy dữ liệu từ danh sách đặt hàng theo khoảng thòi gian nhất định
    public function getChartDataApi()
    {
        $start_date = Input::get('startDate');
        $end_date = Input::get('endDate');
        $chart_data = Order::select(DB::raw('sum(totalPrice) as revenue'),
            DB::raw('date(created_at) as day'))
            ->whereBetween('created_at', array($start_date .' 00:00:00', $end_date . ' 23:59:59'))
            ->groupBy('day')
            ->orderBy('day', 'desc')
            ->get();
        return $chart_data;
    }

    public function getChartOrder() {
        try {
            $data = Order::select(DB::raw('status as status'),
                DB::raw('count(*) as number'))->groupBy('status')->get();
            $array[] = ['Status', 'Number'];
            foreach ($data as $key => $value) {
                $array[++$key] = [$value->statusLabel, $value->number];
            }
            return view('admin.chart.chart', ['order_data' => json_encode($array, JSON_UNESCAPED_UNICODE)]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
