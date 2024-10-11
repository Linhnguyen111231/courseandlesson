<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Courses\App\Http\Controllers\CoursesController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::post('/search/courses',[CoursesController::class,'search'])->withoutMiddleware([\Tymon\JWTAuth\Http\Middleware\Authenticate::class]);;
Route::post('/create/course',[CoursesController::class,'store'])->withoutMiddleware([\Tymon\JWTAuth\Http\Middleware\Authenticate::class]);;
Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('courses', fn (Request $request) => $request->user())->name('courses');
});