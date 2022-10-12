<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LangController;

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

//Auth Routes
Auth::routes();


//language middleware
Route::group(['middleware' => ['language']], function () {
//change language
Route::get('/change-language/{lang}',[LangController::class, 'changeLang']);

//Static and Pages Routes
Route::get('/', [PizzasController::class,'index']);
Route::get('/about', [PagesController::class,'about']);
Route::get('/contact', [PagesController::class,'contact']);


//Checkout cart and order
Route::post('/cart', [CartsController::class, 'store'])->name('cart');
Route::get('/checkout', [CartsController::class, 'index'])->name('checkout');
Route::get('/checkout/get/items', [CartsController::class, 'getCartItems'])->name('checkout');
Route::delete('/delete-pizza/{id}', [CartsController::class, 'deletePizza']);
Route::post('/place-order', [OrderController::class, 'placeOrder']);
Route::get('/orders/get/items', [OrderController::class, 'getOrderItems']);
Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('my-orders');
});


//Backend Routes
Route::group(['middleware' => ['admin','language']], function () {
    Route::get('admin-view', [BackendController::class, 'adminView'])->name('admin.view');
    Route::get('/admin/orders/get/items', [BackendController::class, 'getOrdersItems']);
    Route::get('/admin/pizzas/get/items', [BackendController::class, 'getPizzasItems']);
    Route::put('/order/update-status/{id}', [BackendController::class, 'updateOrderStatus']);
    Route::put('/pizza/update-pizza/{id}', [BackendController::class, 'updatePizzaOfTheDay']);
    Route::delete('/delete-order/{id}', [BackendController::class, 'deleteOrder']);
 });


