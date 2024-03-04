<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

}
