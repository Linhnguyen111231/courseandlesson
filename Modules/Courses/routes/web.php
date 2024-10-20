<?php

use Illuminate\Support\Facades\Route;
use Modules\Courses\App\Http\Controllers\CoursesController;

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
Route::prefix('admin')->middleware(['check.auth', 'admin'])->group(function () {
    
    Route::resource('courses', CoursesController::class)->names('courses');
 });
Route::post('/create/course',[CoursesController::class,'store']);

Route::group([], function () {
});
