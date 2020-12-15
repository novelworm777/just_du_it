<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Shoe;
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

        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->shoe_id = $id;
        $cart->quantity = $request->input('quantity');
        $save = $cart->save();

        if($save) return redirect('/');
        else return redirect()->back();
    }
    
    public function viewCart()
    {
        # code...
    }

    public function editCart(Type $var = null)
    {
        # code...
    }
}
