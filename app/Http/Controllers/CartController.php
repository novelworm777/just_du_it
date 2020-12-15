<?php

namespace App\Http\Controllers;

use App\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $cart = $request->input('quantity');

        DB::table('cart')->insert([
            'shoe_id'   => $cart->id,
            'quantity'  => $cart->quantity,
        ]);

        return redirect('/');
    }
}
