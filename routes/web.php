<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('index');

Route::resource('catalog', App\Http\Controllers\CatalogController::class)->parameters([
    'catalog' => 'slug'
]);

Route::prefix('cart')->group(function()
{
    Route::get('/',  [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('add/{product_id}',  [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::patch('update',  [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::get('drop',  [App\Http\Controllers\CartController::class, 'drop'])->name('cart.drop');
    Route::get('destroy',  [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('checkout',  [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('success/{orderId}',  [App\Http\Controllers\CartController::class, 'success'])->name('cart.success');
});

Route::resource('order', 'OrderController', ['only' => ['store', 'update', 'destroy', 'show']]);
