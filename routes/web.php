<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('auth')->name('index');

Auth::routes();

Route::middleware('auth')->controller(QuestionController::class)->prefix('questions')->group(function () {
    Route::get('/',  'index')->name('questions.index');
    Route::get('/{id}', 'show')->name('questions.show');
});
Route::middleware('auth')->controller(UserController::class)->prefix('users')->group(function() {
    Route::get('/', 'index')->name('users.index');
});