<?php

namespace App\Http\Controllers;

use App\Shoe;
// use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ShoeController extends Controller
{
    public function showAddShoe()
    {
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        return view('addEditShoe', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'action' => 'add',
        ]);
    }

    public function addShoe(Request $request)
    {
        $rules = [
            'name'              => 'required|string',
            'price'             => 'required|integer|min:100',
            'description'       => 'required',
            'image'             => 'mimes:jpeg,jpg,png,gif',
        ];

        $messages = [
            'name.required'              => 'Shoe name must be filled',
            'name.string'                => 'Shoe name must be string',
            'price.required'             => 'Shoe price must be filled',
            'price.integer'              => 'Shoe price must be number',
            'price.min'                  => 'Shoe price must not be less than 100',
            'description.required'       => 'Shoe description must be filled',
            'image.mimes'                => 'Shoe image file must be either jpeg, jpg, png, or gif',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // throw message alert if the required inputs are not according to the rules
        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all);

        // add image
        $extension = $request->file('image')->getClientOriginalExtension();
        $path = $request->name.'.'.$extension;
        Storage::disk('public')->put($path, file_get_contents($request->image));

        // add new shoe
        $shoe = new Shoe;
        $shoe->name = $request->name;
        $shoe->price = $request->price;
        $shoe->description = $request->description;
        $shoe->image = $path;
        $save = $shoe->save();

        if($save) return redirect('/');
        else return redirect()->back();
    }

    public function editShoe($id)
    {
        $auth = Auth::check();

        $role = 'guest';
        $username = 'guest';
        if ($auth){
            $role = Auth::user()->role;
            $username = Auth::user()->username;
        }

        $shoe = Shoe::find($id);

        return view('addEditShoe', [
            'auth' => $auth,
            'role' => $role,
            'username' => $username,
            'action' => 'edit',
            'shoe' => $shoe,
        ]);
    }

    public function updateShoe(Request $request, $id)
    {
        // update name, price, description
        $shoe = Shoe::find($id);
        $shoe->name = $request->name;
        $shoe->price = $request->price;
        $shoe->description = $request->description;

        // update image if an image is uploaded
        if($request->hasFile('image')){
            // delete original image
            $ori_path = $shoe->image;
            File::delete('assets/'.$ori_path);

            // add new image
            $extension = $request->file('image')->getClientOriginalExtension();
            $path = $request->name.'.'.$extension;
            Storage::disk('public')->put($path, file_get_contents($request->image));

            // update in database
            $shoe->image = $path;
        }

        // save update
        $save = $shoe->save();

        if($save) return app()->call('App\Http\Controllers\ViewShoeController@viewShoe', ['id' => $id]);
        else return redirect()->back();
    }
}
