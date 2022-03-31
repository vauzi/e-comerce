<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [LoginController::class, 'logout']);

    Route::get('profile', [ProfileController::class, 'show']);
    Route::post('profile', [ProfileController::class, 'store']);
    Route::put('profile/{id}', [ProfileController::class, 'update']);
    Route::delete('profile/{id}', [ProfileController::class, 'destroy']);
});
Route::post('register', RegisterController::class);
Route::post('login', [LoginController::class, 'login']);
