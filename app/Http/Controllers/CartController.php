<?php

namespace App\Http\Controllers;

use App\Cart;
use App\DetailTransaction;
use App\HeaderTransaction;
use App\Shoe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function viewAddCart($id){
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $shoe = Shoe::where('id', '=', "$id")->first();

        return view('addEditCart', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'shoe' => $shoe,
            'action' => 'add',
            'cart' => NULL,
        ]);
    }

    public function addCart(Request $request, $id){

        $rules = [
            'quantity' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        // throw message alert if the required inputs are not according to the rules
        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all);

        $shoe = Shoe::where('id', '=', "$id")->first();

        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->shoe_id = $id;
        $cart->quantity = $request->input('quantity');
        $cart->total_price = $shoe->price * $request->input('quantity');
        $save = $cart->save();

        if($save) return redirect('/');
        else return redirect()->back();
    }
    
    public function viewCart()
    {
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', '=', "$user_id")->get();

        if (!$carts->isEmpty()) return view('notEmptyCart', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'carts' => $carts,
        ]);
        else return view('emptyCart', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
        ]);
    }

    public function checkoutCart()
    {
        $user_id = Auth::user()->id;
        $total_price = Cart::where('user_id', '=', "$user_id")->sum('total_price');

        // add header transaction
        $head = new HeaderTransaction;
        $head->transaction_date = Carbon::now();
        $head->total_price = $total_price;
        $head->user_id = $user_id;
        $head->save();

        $carts = Cart::where('user_id', '=', "$user_id")->get();

        foreach ($carts as $cart){
            // add detail transaction
            $detail = new DetailTransaction;
            $detail->transaction_id = $head->id;
            $detail->shoe_id = $cart->shoe_id;
            $detail->quantity = $cart->quantity;
            $detail->save();

            // delete cart
            $delete_cart = Cart::find($cart->id);
            $delete_cart->delete();

        }

        return redirect('/');
    }

    public function editCart($id)
    {
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', '=', "$user_id")->first();

        return view('addEditCart', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'shoe' => $shoe,
            'action' => 'add',
            'cart' => $cart,
        ]);
    }

    public function updateCart(Request $request, $id)
    {
        # code...
    }

    public function deleteCart($id)
    {
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:students, id'],
        );

        // throw message alert if the required inputs are not according to the rules
        if($validator->fails())
            return redirect()->back()->withErrors($validator->errors());
        
        $cart = Cart::find($id);
        $cart->delete();
    }
}
