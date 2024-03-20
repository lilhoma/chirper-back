<?php

use App\Http\Controllers\ChirpController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/chirps', function (){
        return auth() -> user() -> chirps;
    });
    Route::post('/chirp', [ChirpController::class, 'store']) ->name('chirp.store');
});

Route::get('/chirps', [ChirpController::class, 'index']) ->name('chirps.index');
