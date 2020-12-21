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
// view cart
Route::get('/view-cart', 'CartController@viewCart');
// checkout
Route::get('/cart-checkout', 'CartController@checkoutCart');

//View All Transaction(admin)
Route::get('/view-all-transaction', 'ViewAllTransactionController@viewAllUserTransaction');
//View All Transaction(member)
Route::get('/view-transaction', 'ViewAllTransactionController@viewUserTransaction');



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
Route::get('/shoe={id}/add-to-cart', 'CartController@viewAddCart')->name('add_cart');
Route::post('/shoe={id}/add-to-cart', 'CartController@addCart');
// edit cart
Route::get('/edit-cart={id}', 'CartController@editCart')->name('edit_cart');
Route::post('/edit-cart={id}', 'CartController@updateCart');
// delete cart
Route::get('/delete-cart={id}', 'CartController@deleteCart');

<<<<<<< HEAD

=======
// add shoe
Route::get('/add-shoe', 'ShoeController@showAddShoe')->name('add_shoe');
Route::post('/add-shoe', 'ShoeController@addShoe');
// update shoe
Route::get('/shoe={id}/edit-shoe', 'ShoeController@editShoe')->name('edit_shoe');
Route::post('/shoe={id}/edit-shoe', 'ShoeController@updateShoe');
>>>>>>> 260740c39f4456e315fb00527d188bf999df1249
