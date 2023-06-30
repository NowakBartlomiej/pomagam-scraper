<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('scrape', [MainController::class, 'scrape']);
Route::get('dailySum', [MainController::class, 'dailySum']);
Route::get('dailyCollectionAmount', [MainController::class, 'dailyCollectionAmount']);


