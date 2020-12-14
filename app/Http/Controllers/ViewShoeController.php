<?php

namespace App\Http\Controllers;

use App\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewShoeController extends Controller
{
    public function viewAllShoe(Request $request){
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $search = $request->input('search');
        $shoes = Shoe::where('name', 'like', "%$search%")->paginate(6);

        return view('home', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'shoes' => $shoes,
        ]);
    }

    public function viewShoe($id){
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $shoe = Shoe::where('id', '=', "$id")->first();

        return view('viewShoeDetail', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'shoe' => $shoe,
        ]);
    }
}
