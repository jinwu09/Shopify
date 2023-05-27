<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocationLogsController;
use App\Http\Controllers\OrderedItemsController;
use App\Http\Controllers\TransactionNotDeliveredController;
use App\Http\Controllers\TransactionReceivedController;

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

Route::post('/login',  [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/sample', function (Request $request) {
    $sample = ["test" => "test"];
    return response()->json(['test' => "sample"]);
    return $request->user();
});
Route::prefix('working')->group(function () {
    Route::group(['namespace' => "App\Http\Controllers", 'middleware' => 'auth:sanctum'], function () {
        Route::apiResource('transaction', TransactionController::class);
        Route::apiResource('transaction_received', TransactionReceivedController::class);
        Route::apiResource('transaction_not_delivered', TransactionNotDeliveredController::class);
        Route::apiResource('user', UserController::class);
        Route::apiResource('item', ItemController::class);
        Route::apiResource('location', LocationLogsController::class);
        Route::apiResource('ordered_item', OrderedItemsController::class);
    });
});
