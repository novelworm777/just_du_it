<?php

namespace App\Http\Controllers;

use App\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addCart(Request $request){
        $quantity = $request->input('quantity');
    }
}
