<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::resource('cart_items', CartItemController::class)->middleware(['auth', 'verified']);

Route::get('orders', [OrderController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('orders/{order}', [OrderController::class, 'show'])->middleware(['auth', 'verified'])->name('orders.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
