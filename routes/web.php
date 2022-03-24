<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('product',[ProductController::class,'index'])->name('product.index');
Route::get('add-product', [ProductController::class, 'create']);
Route::post('add-product', [ProductController::class, 'store']);
Route::get('edit-product/{id}',[ProductController::class,'edit']);
Route::put('update-product/{id}',[ProductController::class,'update']);
Route::post('delete-product/{id}',[ProductController::class,'destroy']);



Route::get('category',[CategoryController::class,'index']);
Route::get('add-category', [CategoryController::class, 'create']);
Route::post('add-category', [CategoryController::class, 'store']);
Route::get('edit-category/{id}',[CategoryController::class,'edit']);
Route::put('update-category/{id}',[CategoryController::class,'update']);
Route::post('delete-category/{id}',[CategoryController::class,'destroy']);






Route::get('/', function () {
    return view('welcome');
});




