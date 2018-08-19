<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'LandingPageController@index');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::post('/shop', 'ShopController@store')->name('shop.store');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');


Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
// Route::post('/cart', 'CartController@storecart')->name('cart.storecart');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');


Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::get('/empty', function(){
    Cart::destroy();
});

Route::get('/later', function(){
    Cart::instance('saveForLater')->destroy();
});


Route::post('/carts', 'CartController@update');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/store', 'StoreController@index')->name('store.index');
Route::post('/store', 'StoreController@store')->name('store.store');
Route::get('/store/{product}', 'StoreController@show')->name('store.show');

