<?php

use App\Http\Controllers\User\EarnController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LeaderboardController;
use App\Http\Controllers\User\LiveLeadsController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\TransactionsController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => false]);

// Landing routes
Route::view('/', 'landing.home')->name('home');
Route::view('/faq', 'landing.faq')->name('faq');
Route::view('/privacy-policy', 'landing.privacy-policy')->name('privacy-policy');
Route::view('/term-condition', 'landing.term-condition')->name('term-condition');
Route::view('/ban', 'landing.ban')->name('ban');
Route::view('/suspicious', 'landing.suspicious')->name('suspicious');

// User routes
Route::middleware(['auth', 'not_banned', 'not_changed_ip'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('user.home');
        Route::post('/dashboard', 'redeem')->name('user.home.redeem');
        Route::post('/notifications/read')->name('notifications.read');
    });

    Route::controller(ShopController::class)->group(function () {
        Route::get('/shop', 'index')->name('user.shop');
        Route::get('/shop/{id}', 'view')->name('user.shop.view');
        Route::post('/shop/{id}', 'checkout')->name('user.shop.checkout');
    });

    Route::controller(SettingsController::class)->group(function () {
        Route::get('/settings', 'index')->name('user.settings');
        Route::post('/settings', 'update')->name('user.settings.update');
    });

    Route::get('/earn', [EarnController::class, 'index'])->name('user.earn')->middleware('proxy');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('user.leaderboard');
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('user.transactions');
    Route::get('/live-leads', [LiveLeadsController::class, 'index'])->name('user.live-leads');
    Route::get('/history', [HistoryController::class, 'index'])->name('user.history');
    Route::view('/proxy', 'user.proxy')->name('user.proxy');
});


