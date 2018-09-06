<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Input;
use function MongoDB\BSON\toJSON;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_order = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.order.list')->with('list_order', $list_order);
    }

    public function changeStatus()
    {
        $id = Input::get('id');
        $status = Input::get('status');
        $order = Order::find($id);
        if ($order == null) {
            return view('admin.error.404');
        }
        $order->status = $status;
        $order->save();
        return redirect('/admin/order');
    }
}
