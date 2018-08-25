<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Orders;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all()->orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.order.list')->with('orders', $orders);


    }


    public function create()
    {
        return view('admin.order.form')
    }


    public function store(Request $request)
    {
        $order = new Order;
        $order->name = $request->get('name');
        $order->gender = $request->get('gender');
        $order->email = $request->get('number');
        $order->phone = $request->get('phone');
        $order->addressDetail = $request->get('addressDetail');
        $order->note = $request->get('note');

        $rules = [
            'name' => 'require|min:6',
            'gender' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'requird|min:11',
            'addressDetail' => 'required',
            'note' => 'nullable'
        ]

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        else {
        $order->save();
        return redirect('admin.order.list')->with('success', 'Tạo đơn hàng thành công');
        }

    }

    public function show($id)
    {
        return view('admin.order.show', ['order' => Order::findOrFail($id)]);
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit');
    }


    public function update(Request $request, $id)
    {

        $order = new Order;
        $order->name = $request->get('name');
        $order->gender = $request->get('gender');
        $order->email = $request->get('number');
        $order->phone = $request->get('phone');
        $order->addressDetail = $request->get('addressDetail');
        $order->note = $request->get('note');
        
        $rules = [
            'name' => 'require|min:6',
            'gender' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'requird|min:11',
            'addressDetail' => 'required',
            'note' => 'nullable'
        ]

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        else {
        $order->save();
        return redirect('admin.order.list')->with('success', 'Sửa đơn hàng thành công');
        }
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('admin.order.list')->with('success','Xóa đơn hàng thành công');
    }
}
