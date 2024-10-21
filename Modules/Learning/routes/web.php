<?php

use Illuminate\Support\Facades\Route;
use Modules\Learning\App\Http\Controllers\LearningController;

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
// Route::get('/learning/{slug}', [LearningController::class, 'show'])->name('learning.show');

Route::prefix('learning')->middleware(['check.auth'])->group(function () {
    Route::get('/{slug}', [LearningController::class, 'show'])->name('learning.show');
 });



