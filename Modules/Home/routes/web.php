<?php

use Illuminate\Support\Facades\Route;
use Modules\Home\App\Http\Controllers\HomeController;

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
Route::get('/course/{slug}', [HomeController::class, 'show'])->name('course.show');


Route::group([], function () {
    Route::resource('home', HomeController::class)->names('home');
});
