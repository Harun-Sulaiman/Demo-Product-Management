<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UsersController;

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

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');

//admin
Route::get('/admin/products', [AdminController::class, 'adminGetAllProducts'])->name('admin.products');
Route::delete('/admin/products/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::namespace('Admin')->resource('/users', UsersController::class, ['except' => ['show', 'create', 'store']]);
});

// Route::middleware(['can:admin-author'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/products', [ProductController::class, 'index'])->name('product.index');
//     Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
//     Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
//     Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
//     Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
//     Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
// });

// Route::middleware(['can:view-products'])->group(function () {
//     Route::get('/products', [ProductController::class, 'index'])->name('product.index');
//     Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
// });