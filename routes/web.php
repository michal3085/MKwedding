<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\MainController;
use App\Models\Guest;
use Illuminate\Support\Facades\App;
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
    Route::get('/guest/{id}/data/save/{admin?}', [GuestsController::class, 'guestDataSave'])->name('guest.data.save');
    Route::get('/guest/companion/add/{id}', [CompanionController::class, 'addCompanion'])->name('add.companion');
    Route::get('/guest/companion/save/{id}', [CompanionController::class, 'saveCompanion'])->name('save.companion');
    Route::get('/guest/show/companion/{id}', [CompanionController::class, 'showCompanionData'])->name('companion.data');
    Route::get('/guest/add/children/{id}', [ChildController::class, 'addChild'])->name('add.children');
    Route::get('/guest/children/save/{id}', [ChildController::class, 'saveChild'])->name('save.child');
    Route::get('/guest/companion/show/{id}', [CompanionController::class, 'showCompanion'])->name('show.companion');
    Route::get('/guest/show/child/{id}', [ChildController::class, 'showChildren'])->name('show.children');

    Auth::routes();

    Route::get('/home', [MainController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function () {
        Route::get('/panel/export/excel/', [GuestsController::class, 'exportToExcel'])->name('excel.export');
        Route::get('/panel/', [AdminsController::class, 'index'])->name('admin');
        Route::post('/panel/add/guest/', [AdminsController::class, 'addGuest'])->name('add.guest');
        Route::get('/panel/guests/confirmed/{filter}', [AdminsController::class, 'filterUsers'])->name('filter.guests');
        Route::get('/panel/guest/{id}', [AdminsController::class, 'guestProfile'])->name('guest.profile');
        Route::get('/panel/search/user/', [AdminsController::class, 'searchGuest'])->name('search.guest');
        Route::get('/panel/guest/confirm/{id}', [AdminsController::class, 'addConfirmation'])->name('panel.confirm');
        Route::get('/panel/guest/delete/confirm/{id}/{with_all?}', [AdminsController::class, 'deleteConfirmation'])->name('panel.del.confirm');
        Route::delete('/panel/delete/guest/{id}', [GuestsController::class, 'deleteGuest']);
        Route::get('/panel/bride/and/groom/', [AdminsController::class, 'brideAndGroom'])->name('bride.and.groom');
        Route::post('/panel/brideandgrrom/data/save/', [AdminsController::class, 'brideAndGroomDataSave'])->name('bride.data.save');

        Route::get('/panel/transport/change/to/brusow/', [Guest::class, 'changeTransportFrom']);
    });
});


