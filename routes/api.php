<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ScoreController;
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

Route::controller(UserController::class)->prefix('auth')->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});
Route::controller(QuestionController::class)->prefix('game')->group(function() {
    Route::get('/questions', 'getQuestions');
});
Route::controller(ScoreController::class)->prefix('score')->group(function() {
    Route::post('/store', 'store');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
