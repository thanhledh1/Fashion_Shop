<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(3);

        return view('customer.index', compact('customers'));
    }
    public function login()
    {

        return view('customer.login');
    }
    public function checklogin(Request $request)
    {
        // dd(123);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('shop.index');
        } else {
            return redirect()->route('customer.login');
        }
    }
    public function register()
    {


        return view('customer.register');
    }
    public function checkRegister(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->psw);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'admin/uploads/customer';
            $newImageName = $image->getClientOriginalName();
            $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $newImageName);
            $customer->image = $newImageName;
        }
        if ($request->psw == $request->psw_repeat) {
            $customer->save();
            return redirect()->route('customer.login');
        } else {
            return redirect()->route('customer.register');

        }

    }
    public function list()
    {
        $customers = Customer::paginate(3);

        return view('customer.list', compact('customers'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('customer.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = $request->password;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'admin/uploads/customer';
            $newImageName = $image->getClientOriginalName();
            $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $newImageName);
            $customer->image = $newImageName;
        }
        $customer->save();
        return redirect()->route('customer.index');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->save();

        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $customers = Customer::where('name', 'LIKE', "%$keyword%")
            ->orWhere('address', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->orWhere('phone', 'LIKE', "%$keyword%")
            ->paginate(3);

        return view('customer.index', compact('customers'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('shop.index');
    }


    public function forgotPassword()
    {
        return view('customer.forgot-password');
    }

    /**
     * Validate token for forgot password
     * @param token
     * @return view
     */
    public function forgotPasswordValidate($token)
    {
        $customer = Customer::where('token', $token)->where('is_verified', 0)->first();
        if ($customer) {
            $email = $customer->email;
            return view('customer.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Password reset link is expired');
    }

    /**
     * Reset password
     * @param request
     * @return response
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $customer = Customer::where('email', $request->email)->first();
        if (!$customer) {
            return back()->with('failed', 'Failed! email is not registered.');
        }

        $token = Str::random(60);

        $customer['token'] = $token;
        $customer['is_verified'] = 0;
        $customer->save();

        return back()->with('failed', 'Failed! there is some issue with email provider');
    }

    /**
     * Change password
     * @param request
     * @return response
     */
    public function updatePassword(Request $request)
{
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password'
    ]);

    $customer = Customer::where('email', $request->email)->where('is_verified', 0)->where('token', $request->token)->first();
    if ($customer) {
        $customer->is_verified = 1;
        $customer->token = '';
        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect()->route('login')->with('success', 'Success! password has been changed');
    }
    return redirect()->route('forgot-password')->with('failed', 'Failed! something went wrong');
}
}
