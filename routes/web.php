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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/', 'FrontController@index')->name('index');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/product/{id}/show', 'FrontController@productSingle')->name('frontend.product.show');
Route::get('/category/{id}/show', 'FrontController@showprodbycategory')->name('frontend.category.show');

//cart area
Route::resource('/cart', 'CartController');

//Buyer Address
Route::resource('/buyer/address', 'BuyeraddressController');

// checkout
Route::get('checkout','CheckoutController@registerbuyer')->name('checkout');
Route::get('buyer/address','CheckoutController@buyeraddress')->name('buyeraddress');

//product search area
Route::post('/search/product', 'SearchController@searchproduct')->name('search.product');


Route::resource('contact','ContactController');


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard.index');
    Route::get('admins', 'AdminController@admins')->name('admins.all');
    Route::post('admin/create', 'AdminController@store')->name('admins.store');

    Route::get('admins/{id}/show', 'AdminController@show')->name('admins.show');
    Route::post('admins/{id}/activate', 'AdminController@activate')->name('admins.activate');
    Route::post('admins/{id}/deactivate', 'AdminController@deactivate')->name('admins.deactivate');


    Route::resource('category','CategoryController');
    Route::resource('shop','ShopController');
    Route::resource('product','ProductController');
    Route::resource('subscription','SubscriptionController');

    Route::get('user/profile','UserController@profileimage')->name('user.profile');
    Route::post('user/profile','UserController@updateprofileimage')->name('user.profile.update');
    
    Route::get('shopowners','ShopownerController@shopowners')->name('shopowner.all');
    Route::get('shopowner/{id}/show','ShopownerController@show')->name('shopowner.show');
    Route::post('shopowner/{id}/activate','ShopownerController@activate')->name('shopowner.activate');
    Route::post('shopowner/{id}/deactivate','ShopownerController@deactivate')->name('shopowner.deactivate');
});
