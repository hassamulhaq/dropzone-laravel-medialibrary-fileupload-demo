<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\MediaController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('products', [ProductsController::class, 'index'])->middleware('auth:sanctum')->name('products.index');
Route::get('products/create', [ProductsController::class, 'create'])->middleware('auth:sanctum')->name('products.create');
Route::post('products/store', [ProductsController::class, 'store'])->middleware('auth:sanctum')->name('products.store');


Route::post('upload-media', MediaController::class)->middleware('auth:sanctum')->name('upload-media');


require __DIR__.'/auth.php';
