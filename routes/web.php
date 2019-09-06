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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/','FrontController@index')->name('index');
Route::get('/about','FrontController@about')->name('about');
Route::get('/contact','FrontController@contact')->name('contact');
Route::get('/cart','FrontController@cart')->name('cart');
Route::get('/checkout','FrontController@checkout')->name('checkout');
Route::get('/shop','FrontController@shop')->name('shop');
Route::get('/wishlist','FrontController@wishlist')->name('wishlist');
Route::get('/product','FrontController@productSingle')->name('product');

Route::group(['prefix'=>'dashboard','middleware'=>'auth'], function(){
    Route::get('/','AdminController@index')->name('dashboard.index');
});

