<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Cookie;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { 
            // login success
            return redirect('/');
        }
        return view('login'); // login failed
    }
 
    public function login(Request $request)
    {

        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'        => 'Email must be filled',
            'email.email'           => 'Email is not valid',
            'password.required'     => 'Password must be filled',
            'password.string'       => 'Password must be string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        // throw message alert if the required inputs are not according to the rules
        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        
        // get the inputs
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
 
        // check whether there is the user inside database
        $result = Auth::attempt($data);

        if ($result){ // login success

            // set cookies if remember me
            if ($request->remember){
                return redirect('/')->withCookie(cookie('name', Auth::user()->name, 120))
                    ->withCookie(cookie('password', $request->password, 120));
            }
            else return redirect('/');
            
        }
        else return redirect()->back(); // login failed
        
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed|min:3'
        ];
 
        $messages = [
            'name.required'         => 'Username must be filled',
            'email.required'        => 'Email address must be filled',
            'email.email'           => 'Email address is not valid',
            'email.unique'          => 'Email address is already registered',
            'password.required'     => 'Password must be filled',
            'password.confirmed'    => 'Password is not the same as confirmed password',
            'password.min'          => 'Password must not be less than 3 characters'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        // throw message alert if the required inputs are not according to the rules
        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all);
 
        $user = new User;
        $user->username = strtolower($request->name);
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->role = 'member';
        $save = $user->save();
 
        if($save) return redirect('/');
        else return redirect()->back();
    }
 
    public function logout()
    {   
        Auth::logout(); // menghapus session yang aktif
        return redirect('/');
    }

}