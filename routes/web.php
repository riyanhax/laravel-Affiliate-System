<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\OrderController;
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
    
    Route::get('/profile', function () {
        return view('deshboard');
    });

    Route::get('/dashboard', [indexController::class, 'index'])->name('dashboard');

});



// ---------------------------- Never Touch this route ------------------------------------
Route::get('/',[indexController::class, 'user'])->name('home');
Route::get('/{reffer_code}',[indexController::class, 'user']);

//---------------------



