<?php

use App\Http\Controllers\api\apiController;
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
});
Route::get('/profile', function () {
    return view('deshboard');
});

Route::get('userdeshboard', function(){
    return view('Affiliator_dashboard');
});

Route::get('home/{reffer_code}',function ($code)
{
    if(!is_null($code)){
        return $code;
    }else{
        return "nothing happend";
    }

});

// Route::get('home',function ()
// {
//     return "iam without code";
// });



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('check-username', [apiController::class, 'check_username'])->name('check-username');
