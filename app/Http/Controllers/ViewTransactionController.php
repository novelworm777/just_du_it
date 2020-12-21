<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewTransactionController extends Controller
{
    public function viewAllTransaction()
    {
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $transactions = DetailTransaction::all();

        if (!$transactions->isEmpty()) return view('notEmptyAllTransaction', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'transactions' => $transactions,
            'curr_transaction_id' => 0,
        ]);
        else return view('emptyTransaction', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
        ]);
    }

    public function viewMemberTransaction()
    {
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $user_id = Auth::user()->id;
        $transactions = DetailTransaction::all();

        if (!$transactions->isEmpty()) return view('notEmptyTransaction', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'transactions' => $transactions,
            'user_id' => $user_id,
            'curr_transaction_id' => 0,
        ]);
        else return view('emptyTransaction', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
        ]);
    }
}
