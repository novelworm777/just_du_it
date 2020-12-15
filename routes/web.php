<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home or view all shoes
Route::get('/', 'ViewShoeController@viewAllShoe');
// login
Route::get('/login', 'AuthController@showFormLogin')->name('login');
Route::post('/login', 'AuthController@login');
// register
Route::get('/register', 'AuthController@showFormRegister')->name('register');
Route::post('/register', 'AuthController@register');
//  routes that need middleware
Route::group(['middleware' => 'auth'], function () {

    // Route::get('/home', 'ViewShoeController@viewAllShoe')->name('home'); // nanti diganti ke /
    Route::get('/logout', 'AuthController@logout');
    // route pada dropdown di sini smua butuh middleware
    // mungkin route nya ga usah dinamain... liat nanti lagi deh

});
// view shoe
Route::get('/shoe={id}', 'ViewShoeController@viewShoe');
// add to cart
Route::get('/shoe={id}/add-to-cart', 'CartController@viewAddCart');
Route::post('/shoe={id}/add-to-cart', 'CartController@addCart');
