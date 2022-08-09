<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

// トップページ
Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('/home', [ProductController::class, 'productList'])->middleware('verified');

// ユーザー処理
Route::controller(AuthController::class)->group(function () {
  // Route::get('/register', 'register');
  // Route::get('/login', 'login');
  Route::get('/logout', 'logout')->middleware('auth');
  Route::get('/email/verify', 'email_notice')->middleware('auth')->name('verification.notice');
  Route::get('/email/verify/{id}/{hash}', 'email_verify')->middleware(['auth', 'signed'])->name('verification.verify');
  Route::get('/email/verification-notification', 'email_send')->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
});

// メール処理
route::post('/email', [SendMailController::class, 'sendMail']);


// roleがログインユーザー以上
Route::middleware('auth', 'verified')->group(function () {

  // マイページ処理
  Route::controller(MypageController::class)->group(function () {
    Route::get('mypage', 'index')->name('mypage.index');
    // Route::post('delivery', 'delivery');
  });

  // カート処理
  Route::controller(CartController::class)->group(function () {
    // Route::get('cart', 'cartList')->name('cart.list');
    Route::post('cart', 'addToCart')->name('cart.store');
    Route::post('update-cart', 'updateCart')->name('cart.update');
    Route::post('remove', 'removeCart')->name('cart.remove');
    Route::post('clear', 'clearAllCart')->name('cart.clear');
  });

  // 決済処理
  Route::post('/charge', [ChargeController::class, 'charge']);

  // お気に入り処理
  Route::controller(LikeController::class)->group(function () {
    Route::get('like', 'index');
    Route::post('like', 'create');
    Route::put('like', 'update');
    Route::delete('like', 'delete');
  });

  //評価データ処理
  Route::controller(CommentController::class)->group(function () {
    Route::get('comment', 'index');
    Route::post('comment', 'create');
    Route::put('comment', 'update');
    Route::delete('comment', 'delete');
  });

  // 配達予約処理
  Route::controller(DeliveryController::class)->group(function () {
    Route::get('delivery', 'index');
    // Route::post('delivery', 'create');
    Route::post('delivery', 'delivery');
    Route::put('delivery', 'update');
    Route::delete('delivery', 'delete');
  });

});



// roleが売り場担当者以上
Route::middleware('auth', 'can:manager-higher')->group(function () {

  // 商品管理ページ処理
  Route::controller(ManageController::class)->group(function () {
    Route::get('manage', 'index')->name('manage.index');
    // Route::post('manage', 'create');
    // Route::put('manage', 'update');
    // Route::delete('manage', 'delete');
  });

  // 商品データ処理
  Route::controller(ProductController::class)->group(function () {
    Route::get('product', 'index');
    Route::post('product', 'create');
    Route::put('product', 'update');
    Route::delete('product', 'delete');
  });

  // 売り場データ処理
  Route::controller(GenreController::class)->group(function () {
    Route::get('genre', 'index');
    Route::post('genre', 'create');
    Route::put('genre', 'update');
    Route::delete('genre', 'delete');
  });

  // 産地データ処理
  Route::controller(AreaController::class)->group(function () {
    Route::get('area', 'index');
    Route::post('area', 'create');
    Route::put('area', 'update');
    Route::delete('area', 'delete');
  });

  // 画像データ処理
  Route::controller(ImageController::class)->group(function () {
    Route::get('img', 'index');
    Route::post('img', 'create');
    Route::put('img', 'update');
    Route::delete('img', 'delete');
  });
});



// roleがシステム管理者のみ
Route::middleware('auth', 'can:admin-onry')->group(function () {

  // 管理者ページ処理
  Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->name('admin.index');
    // Route::post('admin', 'create');
    // Route::put('admin', 'update');
    // Route::delete('admin', 'delete');
  });

  // 売り場担当者データ処理
  Route::controller(ManagerController::class)->group(function () {
    Route::get('manager', 'index');
    Route::post('manager', 'create');
    Route::put('manager', 'update');
    Route::delete('manager', 'delete');
  });

  // ユーザーデータ処理
  Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index');
    Route::post('user', 'create');
    Route::put('user', 'update');
    Route::delete('user', 'delete');
  });

});
