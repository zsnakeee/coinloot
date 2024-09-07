<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users');
    Route::get('/withdrawals', function () { return view('admin.withdrawals'); })->name('admin.withdrawals');
    Route::get('/offerwalls', function () { return view('admin.offerwalls'); })->name('admin.offerwalls');
    Route::get('/payments', [App\Http\Controllers\Admin\PaymentsController::class, 'index'])->name('admin.payments');
    Route::get('/payments/{id}', [App\Http\Controllers\Admin\PaymentsController::class, 'view'])->name('admin.payments.view');
    Route::post('/payments/{id}', [App\Http\Controllers\Admin\PaymentsController::class, 'update'])->name('admin.payments.update');
    Route::get('/payments/{id}/{price_id}', [App\Http\Controllers\Admin\PaymentsController::class, 'view'])->name('admin.payments.view.price');
    Route::get('/leads', [App\Http\Controllers\Admin\LeadsController::class, 'index'])->name('admin.leads');
    Route::get('/bonus',  [App\Http\Controllers\Admin\BonusController::class, 'index'])->name('admin.bonus');
    Route::post('/bonus',  [App\Http\Controllers\Admin\BonusController::class, 'add'])->name('admin.bonus.add');
    Route::put('/bonus',  [App\Http\Controllers\Admin\BonusController::class, 'update'])->name('admin.bonus.update');
    Route::get('/bonus-history',  [App\Http\Controllers\Admin\BonusHistoryController::class, 'index'])->name('admin.bonus-history');
    Route::get('/users/{id}', [App\Http\Controllers\Admin\UsersViewController::class, 'index'])->name('admin.users.view');
    Route::post('/users/{id}', [App\Http\Controllers\Admin\UsersViewController::class, 'update'])->name('admin.users.update');
});
