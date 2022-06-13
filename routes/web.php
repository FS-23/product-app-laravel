<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::get('/products/list' , [ProductController::class , 'index'])->name('products-list');
Route::get('/products/detail/{product}' , [ProductController::class , 'show']);
Route::get('/products/create' , [ProductController::class , 'create']);
Route::post('/products/store' , [ProductController::class , 'store']);
Route::get('/products/delete/{product}' , [ProductController::class , 'destroy']);

Route::get('/products/edit/{product}' , [ProductController::class , 'edit']);
Route::post('/products/update/{product}' , [ProductController::class , 'update']);
