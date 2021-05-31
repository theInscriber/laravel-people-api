<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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

Route::prefix('/people')
    ->name('people.')
    ->middleware(['auth.token'])
    ->group(function () {
        Route::get('/', [PersonController::class, 'getAll'])->name('get_all');
        Route::post('/', [PersonController::class, 'store'])->name('store');
        Route::get('/latest', [PersonController::class, 'getLatest'])->name('get_all.latest');
        Route::get('/statistics', [PersonController::class, 'getStatistics'])->name('get_all.statistics');
        Route::get('/{person}', [PersonController::class, 'get'])->name('get');
        Route::put('/{person}', [PersonController::class, 'update'])->name('update');
        Route::delete('/{person}', [PersonController::class, 'delete'])->name('delete');
    });
