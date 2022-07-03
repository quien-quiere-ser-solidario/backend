<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;

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
})->middleware(['auth', 'is_admin'])->name('index');

Route::get('/home', function() {
    return redirect()->route('index');
})->middleware(['auth', 'is_admin']);

Auth::routes();

Route::middleware(['auth', 'is_admin'])->controller(QuestionController::class)->prefix('questions')->group(function () {
    Route::get('/create', 'create')->name('questions.create');
    Route::get('/edit/{id}', 'edit')->name('questions.edit');
    Route::delete('/destroy/{id}', 'destroy')->name('questions.destroy');
    Route::get('/',  'index')->name('questions.index');
    Route::get('/{id}', 'show')->name('questions.show');
});
Route::middleware(['auth', 'is_admin'])->controller(UserController::class)->prefix('users')->group(function() {
    Route::get('/', 'index')->name('users.index');
});