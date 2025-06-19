<?php

namespace WooSales\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WooSales\Report\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orders()
            ->paginate(config('woo-sales-report.items_per_page'));

        return view('woo-sales-report::orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('ID', $id)->first();
        
        if (!$order) {
            abort(404);
        }

        $customer = $order->getCustomer();
        $total = $order->getTotal();
        $status = $order->getStatus();

        return view('woo-sales-report::orders.show', compact('order', 'customer', 'total', 'status'));
    }
} 