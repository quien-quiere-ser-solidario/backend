<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    Route::patch('/update/{id}', 'update')->name('questions.update');
    Route::post('/store', 'store')->name('questions.store');
    Route::get('/',  'index')->name('questions.index');
    Route::get('/{id}', 'show')->name('questions.show');
});
Route::middleware(['auth', 'is_admin'])->controller(UserController::class)->prefix('users')->group(function() {
    Route::get('/edit/{id}', 'edit')->name('users.edit');
    Route::get('/create', 'create')->name('users.create');
    Route::patch('/update/{id}', 'update')->name('users.update');
    Route::post('/store', 'store')->name('users.store');
    Route::delete('/destroy/{id}', 'destroy')->name('users.destroy');
    Route::get('/', 'index')->name('users.index');
    Route::get('/{id}', 'show')->name('users.show');
});