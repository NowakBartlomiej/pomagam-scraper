<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\DataController;
use App\Http\Controllers\Api\V1\DailySumController;
use App\Http\Controllers\Api\V1\DailyCollectionAmountController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data', [DataController::class, 'index']);
Route::get('getCount', [DataController::class, 'getCount']);
Route::get('getTotalAmount', [DataController::class, 'getTotalAmount']);

Route::get('dailySum', [DailySumController::class, 'index']);
Route::get('dailySumChartData', [DailySumController::class, 'chartData']);
Route::get('dailyCollectionAmount', [DailyCollectionAmountController::class, 'index']);
