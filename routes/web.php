<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/register',[AuthController::class,'pageRegister']);
Route::post('/login',[AuthController::class,  'login']);
Route::get('/login',[AuthController::class,  'pageLogin']);
Route::prefix('admin')->middleware('check.auth')->group(function () {
    Route::get('dashboard',function () {
         return 2;
    }); 
 });
Route::get('/', function () {
    return 1;
});
