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
// 作用: 顯示所有 Products 的資料
// 
// GET     Products/{Product}       Products.show
// 作用: 顯示 Products 資料中的單一筆ID為 {Product} 的資料
//
// GET     Products/create          Products.create
// 作用: 顯示用於建立新的 Product 的前端表單
//
// POST    Products                 Products.store
// 作用: 將 Products/create 路由表單內容新增到資料庫
//
// GET     Products/{Product}/edit  Products.edit
// 作用: 從資料庫查找單一筆ID為 {Product} 的資料，並顯示表單供編輯
// 
// PATCH   Products/{Product}       Products.update
// 作用: 將 Products/{Product}/edit 路由所提供的單一筆ID為 {Product} 的資料更新到資料庫
//
// DELETE  Products/{Product}       Products.destroy
// 作用: 刪除單一筆ID為 {Product} 的資料
//
/*
Route::resource('Products', ProductController::class)->only([
	'index','show','store','update','destroy'
]);
*/

Route::get('Products', [ProductController::class, 'index']);
Route::get('Products/{Product}', [ProductController::class, 'show']);
Route::get('Products/create', [ProductController::class, 'create']);
Route::post('Products', [ProductController::class, 'store']);
Route::get('Products/{Product}/edit', [ProductController::class, 'edit']);
Route::patch('Products/{Product}', [ProductController::class, 'update']);
Route::delete('Products/{Product}', [ProductController::class, 'destroy']);