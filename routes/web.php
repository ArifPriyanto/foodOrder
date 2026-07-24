<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;

Route::get('/', function () {
    return redirect()->route('login');
});

use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {

    if (Auth::user()->role == 'manager') {
        return redirect()->route('manager.dashboard');
    }

    if (Auth::user()->role == 'cashier') {
        return redirect()->route('cashier.dashboard');
    }

    if (Auth::user()->role == 'driver') {
        return redirect()->route('driver.dashboard');
    }

    return redirect()->route('customer.dashboard');

})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::get('/manager/dashboard', [DashboardController::class, 'manager'])
        ->name('manager.dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('menus', MenuController::class);

    Route::resource('users', App\Http\Controllers\UserController::class);

     Route::get('/reports', [OrderController::class, 'report'])
        ->name('manager.report');


});

// CUSTOMER
Route::middleware(['auth','role:customer'])->prefix('customer')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'customer'])
        ->name('customer.dashboard');

    Route::resource('orders', CustomerOrderController::class)
        ->only(['index', 'store']);

});

// CASHIER
Route::middleware(['auth','role:cashier'])->prefix('cashier')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'cashier'])
        ->name('cashier.dashboard');

    Route::get('/orders', [OrderController::class, 'cashierIndex'])
        ->name('cashier.orders');             
        
    Route::get('/orders/{order}', [OrderController::class, 'cashierShow'])
    ->name('cashier.show');

    Route::put('/orders/{order}/process', [OrderController::class, 'processOrder'])
        ->name('cashier.process');
});

Route::middleware(['auth','role:driver'])->prefix('driver')->group(function () {

    Route::get('/dashboard', [DashboardController::class,'driver'])
        ->name('driver.dashboard');

    Route::get('/orders', [DriverController::class, 'index'])
        ->name('driver.orders');

    Route::get('/orders/{order}', [OrderController::class,'driverShow'])
        ->name('driver.show');

    Route::put('/orders/{order}/take', [OrderController::class, 'driverTake'])
    ->name('driver.take');

    Route::put('/orders/{order}/finish', [OrderController::class, 'driverFinish'])
    ->name('driver.finish');

    

});


require __DIR__.'/auth.php';
