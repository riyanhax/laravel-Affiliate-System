<?php

use App\Http\Controllers\api\apiController;
use App\Http\Controllers\indexController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('home/{reffer_code}',function ($code)
{
    if(!is_null($code)){
        return $code;
    }else{
        return "nothing happend";
    }

});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [indexController::class, 'index'])->name('dashboard');
});



