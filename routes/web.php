<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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

// Route::get('/', function () {
//     return view('admin/dashboard');
// });
Route::get('/home', [HomeController::class, 'index']);
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => 'is_admin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index']);
    Route::prefix('event')->group(function() {
        Route::get('/', [AdminEventController::class, 'index']);
        Route::get('/insert', [AdminEventController::class, 'insert']);
        Route::post('/insert-proses',[AdminEventController::class, 'insertAction']);
        Route::get('/edit/{id}',[AdminEventController::class, 'edit']);
        Route::put('/{id}', [AdminEventController::class, 'update']);
        Route::get('/delete/{id}', [AdminEventController::class, 'delete']);
    });
    Route::prefix('ticket')->group(function() {
        Route::get('/', [AdminTicketController::class, 'index']);
        Route::get('/insert', [AdminTicketController::class, 'insert']);
        Route::post('/insert-proses', [AdminTicketController::class, 'InsertAction']);
        Route::get('/edit/{id}', [AdminTicketController::class, 'edit']);
        Route::put('/{id}',[AdminTicketController::class, 'update']);
        Route::get('/delete/{id}', [AdminTicketController::class, 'delete']);
    });
    Route::prefix('order')->group(function() {
        Route::get('/', [AdminOrderController::class, 'index']);
        Route::get('/insert', [AdminOrderController::class, 'insert']);
        Route::post('/insert-proses',[AdminOrderController::class, 'insertAction']);
        Route::get('/item/{id}', [AdminOrderController::class, 'insertItem']);
        Route::post('/item-proses/{id}', [AdminOrderController::class, 'insertItemAction']);
        Route::get('/edit/{id}', [AdminOrderController::class,'edit']);
        Route::put('/{id}' ,[AdminOrderController::class, 'update']);
        Route::get('/delete/{id}', [AdminOrderController::class, 'delete']);
    });
});

Auth::routes();
