<?php

use App\Http\Controllers\FoodItemController;
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
Route::post('/fooditems', [FoodItemController::class, 'store']);
Route::get('/fooditems/{id}', [FoodItemController::class, 'show']);
Route::put('/fooditems/{id}', [FoodItemController::class, 'update']);
Route::delete('/fooditems/{id}', [FoodItemController::class, 'destroy']);
Route::get('/donors/{donorId}/fooditems', [FoodItemController::class, 'indexByDonor']);
