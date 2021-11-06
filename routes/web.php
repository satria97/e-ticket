<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController as AdminEventController;

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
    return view('admin/dashboard');
});
Route::group(['prefix' => 'admin'], function () {
    Route::prefix('event')->group(function() {
        Route::get('/', [AdminEventController::class, 'index']);
        Route::get('/insert', [AdminEventController::class, 'insert']);
        Route::post('/insert-proses',[AdminEventController::class, 'insertAction']);
        Route::get('/edit/{id}',[AdminEventController::class, 'edit']);
        Route::PUT('/{id}', [AdminEventController::class, 'update']);
        Route::get('/delete/{id}', [AdminEventController::class, 'delete']);
    });
});
