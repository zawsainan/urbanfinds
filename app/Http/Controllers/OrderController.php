<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with(['user','items.product'])->latest()->paginate(10);
        return view('admin.order.index',['orders' => $orders]);
    }

    public function detail($id){
        $order = Order::with(['user','items.product'])->find($id);
        return view('admin.order.detail',['order' => $order]);
    }

    public function checkout(){
        $orderItems = session()->get('cart');
        return view('admin.order.checkout',['orderItems' => $orderItems]);
    }

    public function process(){
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->save();
        foreach(session()->get('cart') as $key => $item){
            $orderItem = new OrderItem();
            $orderItem->product_id = $key;
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $order->total_amount += $item['price'] * $item['quantity'];
            $order->items()->save($orderItem);
        }
        $order->save();
        session()->forget('cart');
        return redirect('/products')->with('success','Your order has been placed successfully');
    }

    public function confirm($id){
        $order = Order::find($id);
        $order->status = 'complete';
        $order->save();
        return redirect("admin/order");
    }

    public function refund($id){
        $order = Order::find($id);
        $order->status = 'refunded';
        $order->save();
        return redirect("admin/order");
    }
}
