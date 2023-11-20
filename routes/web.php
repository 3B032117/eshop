<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CRUD 路由使用的方法、URL及路由名稱
// 
// GET     Products                 Products.index
// GET     Products/{Product}       Products.show
// GET     Products/create          Products.create
// POST    Products                 Products.store
// GET     Products/{Product}/edit  Products.edit
// PATCH   Products/{Product}       Products.update
// DELETE  Products/{Product}       Products.destroy
Route::resource('Products', ProductController::class);
