<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function store(Request $request)
    {
        $order_detail = new OrderDetail();
        $order_detail->order_id  = $request->order_id;
        $order_detail->product_id  = $request->product_id;
        $order_detail->quantity = $request->quantity;
        $order_detail->total = $request->total;


        $order_detail->save();
        return response()->json([
            'message' => 'ok',
            'order_detail' => $order_detail
        ], 201);
    }

}
