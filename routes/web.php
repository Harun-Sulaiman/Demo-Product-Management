<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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
