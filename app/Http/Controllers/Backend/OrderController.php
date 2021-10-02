<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::whereId($order->id)
            ->with(['user', 'division', 'district', 'state'])
            ->first();
        $orderItems = OrderItem::where('order_id', $order->id)
            ->with('product')
            ->orderBy('id', 'DESC')->get();

        return view('admin.Orders.show', compact(
            'order',
            'orderItems'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function pendingOrderIndex()
    {
        $orders = Order::where('status', 'pending')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }

    public function confirmedOrderIndex()
    {
        $orders = Order::where('status', 'confirmed')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }

    public function processingOrderIndex()
    {
        $orders = Order::where('status', 'processing')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }

    public function pickedOrderIndex()
    {
        $orders = Order::where('status', 'picked')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }

    public function shippedOrderIndex()
    {
        $orders = Order::where('status', 'shipped')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }

    public function deliveredOrderIndex()
    {
        $orders = Order::where('status', 'delivered')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }

    public function cancelOrderIndex()
    {
        $orders = Order::where('status', 'cancel')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }
    public function returnOrderIndex()
    {
        $orders = Order::where('status', 'return')->latest('id')->get();
        return view('admin.Orders.index', compact(
            'orders'
        ));
    }
}
