<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->psw);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'admin/uploads/customer';
            $newImageName = $image->getClientOriginalName();
            $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $newImageName);
            $customer->image = $newImageName;
        }
        $customer->save();
        return response()->json([
            'message' => 'ok',
            'customer' => $customer
        ], 201);
    }

    public function checklogin(Request $request)
{
    $arr = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::guard('customers')->attempt($arr)) {
        // Đăng nhập thành công, trả về một mảng JSON
        return response()->json(['success' => true], 200);
    } else {
        // Đăng nhập không thành công, trả về một mảng JSON
        return response()->json(['success' => false,]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
