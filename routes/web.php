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
// logout
Route::get('/logout', 'AuthController@logout')->middleware('auth');
// view shoe details
Route::get('/shoe={id}', 'ViewShoeController@viewShoe');

// role : member
Route::group(['middleware' => ['auth', 'role:member']], function() {
    // add to cart
    Route::get('/shoe={id}/add-to-cart', 'CartController@viewAddCart')->name('add_cart');
    Route::post('/shoe={id}/add-to-cart', 'CartController@addCart');
    // view cart
    Route::get('/view-cart', 'CartController@viewCart');
    // edit cart
    Route::get('/edit-cart={id}', 'CartController@editCart')->name('edit_cart');
    Route::post('/edit-cart={id}', 'CartController@updateCart');
    // delete cart
    Route::get('/delete-cart={id}', 'CartController@deleteCart');
    // checkout
    Route::get('/cart-checkout', 'CartController@checkoutCart');
    // view transaction
    Route::get('/view-transaction', 'viewTransactionController@viewMemberTransaction');
});

// role : admin
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    // update shoe
    Route::get('/shoe={id}/edit-shoe', 'ShoeController@editShoe')->name('edit_shoe');
    Route::post('/shoe={id}/edit-shoe', 'ShoeController@updateShoe');
    // add shoe
    Route::get('/add-shoe', 'ShoeController@showAddShoe')->name('add_shoe');
    Route::post('/add-shoe', 'ShoeController@addShoe');
    // view all transaction
    Route::get('/view-all-transaction', 'viewTransactionController@viewAllTransaction');
});