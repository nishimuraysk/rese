<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RepresentativeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/mypage', [UserController::class, 'mypage']);
    Route::get('/mypage/reservation/{reservation_id}', [UserController::class, 'reservation']);
    Route::post('/mypage/reservation/{reservation_id}', [ReservationController::class, 'update']);
    Route::post('/favorite', [FavoriteController::class, 'create']);
    Route::post('/favorite/delete', [FavoriteController::class, 'delete']);
    Route::post('/reserve', [ReservationController::class, 'create']);
    Route::post('/reserve/delete', [ReservationController::class, 'delete']);
    Route::get('/mypage/history', [UserController::class, 'history']);
    Route::get('/mypage/review/done', function () {
        return view('review_done');
    });
    Route::get('/mypage/review/{reservation_id}', [ReviewController::class, 'index']);
    Route::post('/mypage/review/{reservation_id}', [ReviewController::class, 'review']);
    Route::get('/shop', [ShopController::class, 'shop']);
    Route::post('/shop', [ShopController::class, 'create']);
    Route::get('/shop/update/{shop_id}', [ShopController::class, 'renew']);
    Route::post('/shop/update/{shop_id}', [ShopController::class, 'update']);
    Route::get('/shop/reservation/{shop_id}', [ShopController::class, 'representative']);
    Route::get('/representative', [RepresentativeController::class, 'index']);
    Route::post('/representative', [RepresentativeController::class, 'create']);
    Route::get('/done', function () {
        return view('done');
    });
    Route::get('/shop/done', function () {
        return view('shop_done');
    });
    Route::get('/representative/done', function () {
        return view('representative_done');
    });
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
