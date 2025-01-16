<?php

use App\Models\EventType;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\FlowerTypeController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardCheckoutController;
use App\Http\Controllers\DashboardCheckoutItem;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardFlowerTypeController;
use App\Http\Controllers\DashboardCollectionsController;
use App\Http\Controllers\DashboardContactController;
use App\Http\Controllers\DashboardCustomOrderController;
use App\Http\Controllers\DashboardEventTypeController;
use App\Http\Controllers\DashboardProductTypeController;
use App\Http\Controllers\DashboardAccountController;

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

Route::get('/faqs', function () {
    return view('footer.faqs', [
        "title" => "Faqs",
    ]);
});

Route::get('/guide', function () {
    return view('footer.guide', [
        "title" => "Guide",
    ]);
});

Route::get('/terms-and-conditions', function () {
    return view('footer.term', [
        "title" => "Term and Condition",
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "About Us",
    ]);
});

Route::resource('/custom-order', CustomOrderController::class);

Route::resource('/contact', ContactController::class);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:slug}', [ProductController::class, 'show']);


Route::get('/flowers/{type:slug}', [FlowerTypeController::class, 'show'])->name('flowers.products');
Route::get('/collections/{type:slug}', [ProductTypeController::class, 'show'])->name('collections.products');
Route::get('/event/{type:slug}', [EventTypeController::class, 'show'])->name('events.products');

Route::post('/cart', [CartController::class, 'addToCart']);
Route::delete('/cart/delete/{index}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');

Route::post('/place-order', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/products/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/products/pdf', [DashboardProductController::class, 'generatePDF'])->middleware('auth');
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');
Route::resource('/dashboard/contacts', DashboardContactController::class)->middleware('auth');
Route::resource('/dashboard/custom-order', DashboardCustomOrderController::class)->middleware('auth');

// Route::resource('/dashboard/account', DashboardAccountController::class)->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/account/edit', [DashboardAccountController::class, 'edit'])->name('account.edit');
    Route::put('/dashboard/account/{user}', [DashboardAccountController::class, 'update'])->name('account.update');
});

Route::get('/dashboard/orders/pdf', [DashboardCheckoutController::class, 'generatePdf'])->name('orders.pdf')->middleware('auth');
Route::resource('/dashboard/checkouts', DashboardCheckoutController::class)->middleware('auth');
Route::resource('/dashboard/checkout-items', DashboardCheckoutItem::class)->middleware('auth');


Route::resource('/dashboard/collections/flower', DashboardFlowerTypeController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/collections/new', DashboardProductTypeController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/collections/event', DashboardEventTypeController::class)->except('show')->middleware('auth');


