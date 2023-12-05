<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/mypage', [UserController::class, 'mypage']);
    Route::get('/mypage/reservation/{reservation_id}', [UserController::class, 'reservation']);
    Route::post('/mypage/reservation/{reservation_id}', [ReservationController::class, 'update']);
    Route::post('/favorite', [FavoriteController::class, 'create']);
    Route::post('/favorite/delete', [FavoriteController::class, 'delete']);
    Route::post('/reserve', [ReservationController::class, 'create']);
    Route::post('/reserve/delete', [ReservationController::class, 'delete']);
    Route::get('/mypage/history', [UserController::class, 'history']);
    Route::get('/done', function () {return view('done');});
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/thanks', function ()
{
    return view('thanks');
});

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

require __DIR__.'/auth.php';
