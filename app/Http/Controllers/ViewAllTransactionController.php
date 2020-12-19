<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use App\Shoe;
use App\HeaderTransaction;
use App\DetailTransaction;
use Illuminate\Http\Request;

class ViewAllTransactionController extends Controller
{
    
    public function viewAllUserTransaction(){
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $user_id = Auth::user()->id;
        
        $headers = HeaderTransaction::all();
        $details = DetailTransaction::all();
        if(!$headers->isEmpty()) return view('notEmptyViewAllTransaction',[
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'headers' => $headers,
        ]);
        else return view('EmptyViewAllTransaction',[
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            
            
        ]);
    }

    public function viewUserTransaction(){
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }


        $user_id = Auth::user()->id;
        $headers = HeaderTransaction::where('user_id', '=', "$user_id")->get();
        

        if(!$headers->isEmpty()) return view('notEmptyViewAllTransaction',[
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'headers' => $headers,
            
        ]);
        else return view('EmptyViewAllTransaction',[
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            
            
        ]);
    }

    
}
