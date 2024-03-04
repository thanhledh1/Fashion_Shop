<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    public function index()
    {
        // $this->authorize('viewAny', Order::class);
        $items = Order::select('id', 'customer_id','status',DB::raw('MAX(created_at) as last_order'))
            ->groupBy('id', 'customer_id','status')
            ->get();
        return view('order.index', compact('items'));
    }
    public function detail($id)
    {
        // $this->authorize('view', Order::class);
        $items = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->join('products', 'order_detail.product_id', '=', 'products.id')
            ->select('orders.*', 'customers.name as customer_name', 'products.name as product_name', 'products.price as product_price', 'order_detail.*')
            ->where('orders.id', '=', $id)
            ->orderBy('orders.date_at', 'DESC')
            ->get();

        // dd($items);
        return view('order.orderdetail', compact('items'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        // Xóa các chi tiết đơn hàng liên quan
        OrderDetail::where('order_id', $id)->delete();
        // Xóa đơn hàng
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Đơn hàng đã được xóa thành công.');
    }

    // public function exportOrder()
    // {
    //     return Excel::download(new OrderExport, 'order.xlsx');
    // }
}
