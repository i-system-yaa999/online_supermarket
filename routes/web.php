<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

// トップページ
Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('/home', [ProductController::class, 'productList'])->name('products.list')->middleware('verified');

// ユーザー処理
Route::controller(AuthController::class)->group(function () {
  // Route::get('/register', 'register');
  // Route::get('/login', 'login');
  Route::get('/logout', 'logout')->middleware('auth');
  Route::get('/email/verify', 'email_notice')->middleware('auth')->name('verification.notice');
  Route::get('/email/verify/{id}/{hash}', 'email_verify')->middleware(['auth', 'signed'])->name('verification.verify');
  Route::get('/email/verification-notification', 'email_send')->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
});


// カート処理
Route::controller(CartController::class)->group(function () {
  Route::middleware('auth', 'verified')->group(function () {
    Route::get('cart', 'cartList')->name('cart.list');
    Route::post('cart', 'addToCart')->name('cart.store');
    Route::post('update-cart', 'updateCart')->name('cart.update');
    Route::post('remove', 'removeCart')->name('cart.remove');
    Route::post('clear', 'clearAllCart')->name('cart.clear');
  });
});
// 決済処理
Route::post('/charge', [ChargeController::class, 'charge'])->middleware('auth' , 'verified');

// マイページ処理
Route::controller(MypageController::class)->group(function () {
  Route::middleware('auth', 'verified')->group(function () {
    Route::get('mypage', 'index');
    Route::post('delivery', 'delivery');
  });
});

// マネージャー処理
Route::controller(ManageController::class)->group(function () {
  Route::middleware('auth', 'verified')->group(function () {
    Route::get('manage', 'index');
    Route::post('manage', '');
    Route::post('manage', '');
  });
});

// 管理者処理
Route::controller(AdminController::class)->group(function () {
  Route::middleware('auth', 'verified')->group(function () {
    Route::get('admin', 'index');
    Route::post('admin', '');
    Route::post('admin', '');
    Route::post('admin', '');
  });
});

// メール処理
route::post('/mail', [SendMailController::class, 'sendMail']);


// お気に入り処理
Route::controller(LikeController::class)->group(function () {
  Route::middleware('auth', 'verified')->group(function () {
    Route::post('like', 'create');
    Route::delete('like', 'delete');
  });
});

route::get('/thanks',function(){
  return view('thanks')->with([
    'delivery'=> null,
  ]);
});