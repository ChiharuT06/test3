<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController; //追加
use App\Providers\AuthServiceProvider;//追加
use App\Providers\BroadcastServiceProvider;//追加
use App\Providers\EventServiceProvider;//追加
use App\Http\Controllers\SeatController; //追加


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

Route::apiResource('guests', GuestController::class);
Route::apiResource('seats', SeatController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
