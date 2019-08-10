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

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::get('/','AdminController@index')->name('admin.index');
});
Route::group(['prefix'=>'item','middleware'=>'auth'], function(){
    Route::get('/create','ItemsController@create')->name('admin.create.item');
});
Route::group(['prefix'=>'category','middleware'=>'auth'], function(){
    Route::get('/create','CategoriesController@create')->name('admin.create.category');
});
