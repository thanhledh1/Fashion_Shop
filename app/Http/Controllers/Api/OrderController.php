<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order();
        $order->date_at = $request->date_at;
        $order->note = $request->note;
        $order->price = $request->price;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->customer_id  = $request->customer_id ;

        $order->save();
        return response()->json([
            'message' => 'ok',
            'order' => $order
        ], 201);
    }


    public function checkout(Request $request)
    {
        $cart = $request->input('cart');
        $userdata = $request->input('userdata');
        $order = new Order();
        $order->customer_id = $userdata['customer_id'];
        // Save the order
        $order->save();
        if (count($cart) > 0) {
            foreach ($cart as $key => $cartItem) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = (int) $cartItem['product_id'];
                $orderDetail->quantity = $cartItem['quantity'];
                $orderDetail->total = $cartItem['quantity'] * $cartItem['product']['price'];
                $orderDetail->save();
            }
        }

        // Return a response indicating the order was placed successfully
        return response()->json([
            'data' => $orderDetail,
            'message' => 'Order placed successfully'
        ]);
    }
    }

