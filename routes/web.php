<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\ensureUserSuperAdmin;
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

// --------------------------   public routes -------------------------


Route::get('order', [OrderController::class, 'orderProduct'])->name('order');
Route::post('order-confirmation', [OrderController::class, 'store'])->name('order-confirmation');



// ---------------------------  Protected Routes ---------------------------------

Route::middleware(['auth:sanctum'])->group(function () {


    
    Route::get('dashboard', function () {
        return view('deshboard');
    })->name('dashboard');

    // Route::get('/dashboard', [indexController::class, 'index'])->name('dashboard');





    // super admin routes 

    Route::middleware(ensureUserSuperAdmin::class)->group(function () {
        Route::get('super-admin', [SuperAdminController::class, 'index'])->name('superAdmin');
        Route::get('pending-orders', [SuperAdminController::class, 'pendingOrders'])->name('pendingOrders');
        Route::get('all-orders', [SuperAdminController::class, 'allOrders'])->name('allOrders');
    });

});



// ----------------------------Never Touch this route ------------------------------------
Route::get('/',[indexController::class, 'user'])->name('home');
Route::get('/{reffer_code}',[indexController::class, 'user']);

//---------------------



