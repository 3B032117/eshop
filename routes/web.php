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
// GET     products                 products.index
// 作用: 顯示所有 products 的資料
// 
// GET     products/{product}       products.show
// 作用: 顯示 products 資料中的單一筆ID為 {product} 的資料
//
// GET     products/create          products.create
// 作用: 顯示用於建立新的 product 的前端表單
//
// POST    products                 products.store
// 作用: 將 products/create 路由表單內容新增到資料庫
//
// GET     products/{product}/edit  products.edit
// 作用: 從資料庫查找單一筆ID為 {product} 的資料，並顯示表單供編輯
// 
// PATCH   products/{product}       products.update
// 作用: 將 products/{product}/edit 路由所提供的單一筆ID為 {product} 的資料更新到資料庫
//
// DELETE  products/{product}       products.destroy
// 作用: 刪除單一筆ID為 {product} 的資料
//
/*
Route::resource('products', ProductController::class)->only([
	'index','show','store','update','destroy'
]);
*/

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{product}/edit', [ProductController::class, 'edit']);
Route::patch('products/{product}', [ProductController::class, 'update']);
Route::delete('products/{product}', [ProductController::class, 'destroy']);

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
