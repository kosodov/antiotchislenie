<?php

use Illuminate\Support\Facades\Route;



//CRUD
use App\Http\Controllers\OrderController;
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::put('/orders/{order}/take', [OrderController::class, 'takeOrder'])->name('orders.take');
//CRUD
//CRUD
use App\Http\Controllers\DishController;
Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');
Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store');
Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->name('dishes.edit');
Route::put('/dishes/{dish}', [DishController::class, 'update'])->name('dishes.update');
Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');
//CRUD



use App\Http\Controllers\MenuController;

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/menu/{dish}/add-to-cart', [MenuController::class, 'addToCart'])->name('menu.addToCart');
Route::post('/menu/{dish}/remove-from-cart', [MenuController::class, 'removeFromCart'])->name('menu.removeFromCart');
Route::post('/menu/update-delivery-address', [MenuController::class, 'updateDeliveryAddress'])->name('menu.updateDeliveryAddress');
Route::post('/menu/update-delivery-time', [MenuController::class, 'updateDeliveryTime'])->name('menu.updateDeliveryTime');





use App\Http\Controllers\CourierController;

Route::get('/courier', [CourierController::class, 'index'])->name('courier.index');
Route::post('/courier/{order}/take-order', [CourierController::class, 'takeOrder'])->name('courier.takeOrder');
Route::post('/courier/{order}/confirm-delivery', [CourierController::class, 'confirmDelivery'])->name('courier.confirmDelivery');
Route::post('/courier/{order}/report-problem', [CourierController::class, 'reportProblem'])->name('courier.reportProblem');



use App\Http\Controllers\KitchenController;

Route::get('/kitchen', [KitchenController::class, 'index'])->name('kitchen.index');
Route::post('/kitchen/{order}/start-preparation', [KitchenController::class, 'startPreparation'])->name('kitchen.startPreparation');



//_______________________________________________________________________________________________________________


Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/photos/{id}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
