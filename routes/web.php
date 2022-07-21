<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    $cats = DB::table('categorys')->get();
    $products = DB::table('products')->get();
    return view('welcome', compact('cats', 'products'));
})->name('main');

Auth::routes();

// Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');



// Admin routes

Route::get('/admin/products', '\App\Http\Controllers\ProductsController@index')->name('productlist')->middleware('auth');

Route::get('/admin/deleteproduct/{id}', '\App\Http\Controllers\ProductsController@deleteproduct')->name('deleteproduct')->middleware('auth');

Route::get('/admin/addproduct', '\App\Http\Controllers\ProductsController@addproduct')->name('addproduct')->middleware('auth');

Route::post('/admin/addproductcheck', '\App\Http\Controllers\ProductsController@addproductcheck')->name('addproductcheck')->middleware('auth');

Route::get('/admin/editproduct/{id}', '\App\Http\Controllers\ProductsController@editproduct')->name('editproduct')->middleware('auth');

Route::post('/admin/editproductcheck/{id}', '\App\Http\Controllers\ProductsController@editproductcheck')->name('editproductcheck')->middleware('auth');


Route::get('/admin/categorys', '\App\Http\Controllers\CategoryController@categoryslist')->name('categoryslist')->middleware('auth');

Route::get('/admin/deletecategory/{id}', '\App\Http\Controllers\CategoryController@deletecategory')->name('deletecategory')->middleware('auth');

Route::get('/admin/addcategory', '\App\Http\Controllers\CategoryController@addcategory')->name('addcategory')->middleware('auth');

Route::post('/admin/addcategorycheck', '\App\Http\Controllers\CategoryController@addcategorycheck')->name('addcategorycheck')->middleware('auth');

Route::get('/admin/editcategory/{id}', '\App\Http\Controllers\CategoryController@editcategory')->name('editcategory')->middleware('auth');

Route::post('/admin/editcategorycheck/{id}', '\App\Http\Controllers\CategoryController@editcategorycheck')->name('editcategorycheck')->middleware('auth');
