<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\VideoController;
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


Route::get('/', [VideoController::class, 'home'])->name('video.newHome');
/*Route::get('/detail/{video}/{image}', [VideoController::class,'show'])->name('detail');*/
Route::get('/detail/{id}', [VideoController::class, 'detail'])->name('detail');
Route::get('/last-added', [VideoController::class, 'lastAdded'])->name('lastAdded');
Route::get('/most-viewed', [VideoController::class, 'mostViewed'])->name('mostViewed');


//panel routes start
Route::group(['prefix' => 'HSGY11MU77', 'middleware' => ['auth_cas', 'throttle:ip_address','checkCountry']], function () {
    Route::controller(PanelController::class)->group(function () {
        Route::get('/', 'index')->name('panel.index');
        Route::get('/logout', [PanelController::class, "logout"])->name('logout');


        Route::group(['prefix' => '/videos'], function () {
            Route::post('/create', [VideoController::class, "create"])->name('video.create');
            Route::get('/list', [VideoController::class, "list"])->name('video.list');
            Route::get('/fetch', [VideoController::class, 'fetch'])->name('video.fetch');
            Route::post('/delete', [VideoController::class, 'delete'])->name('video.delete');
            Route::get('/get', [VideoController::class, 'get'])->name('video.get');
            Route::post('/update', [VideoController::class, 'update'])->name('video.update');
        });
    });
    Route::group(['prefix' => '/categories'], function () {
        Route::post('/create', [CategoryController::class, "create"])->name('category.create');
        Route::get('/list', [CategoryController::class, "list"])->name('category.list');
        Route::get('/fetch', [CategoryController::class, 'fetch'])->name('category.fetch');
        Route::post('/delete', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/get', [CategoryController::class, 'get'])->name('category.get');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    });
});


Route::get('/newlayout', function () {
    return view('newlayout');
});


//panel routes finish

