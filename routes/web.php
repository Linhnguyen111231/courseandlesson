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
Route::get('/login',action: [AuthController::class,  'pageLogin']);
Route::prefix('/')->middleware('check.auth')->group(function () {
     Route::get('/',function () {
          return '/';
          });
     Route::get('course/{slug}',function () {
          return 2;
     }); 
  });
// Route::prefix('admin')->middleware(['check.auth', 'admin'])->group(function () {
//     Route::get('dashboard',function () {
//          return 2;
//     }); 
//  });
