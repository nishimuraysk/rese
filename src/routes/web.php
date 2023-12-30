<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::group(['middleware' => ['auth', 'verified']], function () {
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
    Route::get('/select', [RepresentativeController::class, 'select']);
    Route::get('/mail', [MailController::class, 'index']);
    Route::post('/mail', [MailController::class, 'send']);
});

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

Route::get('/dashboard', function () {
    return redirect('/');
});

require __DIR__ . '/auth.php';
