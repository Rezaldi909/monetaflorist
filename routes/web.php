<?php


use App\Models\Product;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\FlowerTypeController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\HomeController;

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



Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About Us",
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "CONTACT",
    ]);
});

Route::get('/custom-order', function () {
    return view('custom-order', [
        "title" => "CUSTOM-ORDER",
    ]);
});


Route::get('/products', [ProductController::class, 'index']);
Route::get('products/{product:slug}', [ProductController::class, 'show']);

Route::get('/flowers/{type:slug}', [FlowerTypeController::class, 'show'])->name('flowers.products');
Route::get('/collections/{type:slug}', [ProductTypeController::class, 'show'])->name('collection.products');
Route::get('/event/{type:slug}', [EventTypeController::class, 'show'])->name('event.products');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/products/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');


