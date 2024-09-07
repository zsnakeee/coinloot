<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return "welcome form snake api";
});


Route::any('/adgem', [App\Http\Controllers\Api\AdgemController::class, 'callback']);
Route::any('/admantum', [App\Http\Controllers\Api\AdmantumController::class, 'callback']);
Route::any('/adscendmedia', [App\Http\Controllers\Api\AdscendmediaController::class, 'callback']);
Route::any('/adwallgate', [App\Http\Controllers\Api\AdwallgateController::class, 'callback']);
Route::any('/cpalead', [App\Http\Controllers\Api\CPALeadController::class, 'callback']);
Route::any('/offertoro', [App\Http\Controllers\Api\OffertoroController::class, 'callback']);
Route::any('/revenue', [App\Http\Controllers\Api\RevenueController::class, 'callback']);
Route::get('/mediumpath', [App\Http\Controllers\Api\MediumpathController::class, 'callback']);
Route::get('/monlix', [App\Http\Controllers\Api\MonlixController::class, 'callback']);
Route::get('/notik', [App\Http\Controllers\Api\NotikController::class, 'callback']);
Route::get('/cpxresearch', [App\Http\Controllers\Api\CPXResearchController::class, 'callback']);


