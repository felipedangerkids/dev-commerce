<?php

namespace App\Http\Controllers;

use App\Models\UserOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order;

    public function __construct(UserOrder $order)
    {
        $this->order = $order;
    }
    public function index()
    {

        $orders = $this->order->with('user')->get();

        // dd($orders);
        return view('painel.orders.list', compact('orders'));
    }

    public function showOrder($id)
    {

        $order = $this->order->with('user', 'shippings')->find($id);

        // dd($orders);
        return view('painel.orders.order', compact('order'));
    }
}
