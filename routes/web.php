<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\MainController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => 'under-construction'], function () {
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::post('/confirm/me/', [GuestsController::class, 'confirmGuest'])->name('guest.confirm');
    Route::get('/confirmed/thank/you', [GuestsController::class, 'confirmedInfo'])->name('confirmed');
    Route::post('/guest/{id}/data/save', [GuestsController::class, 'guestDataSave'])->name('guest.data.save');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function () {
        Route::get('/panel/', [AdminsController::class, 'index'])->name('admin');
        Route::post('/panel/add/guest/', [AdminsController::class, 'addGuest'])->name('add.guest');
    });
});

URL::forceScheme('https');

