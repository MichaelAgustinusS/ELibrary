<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('add-book', [BookController::class, 'create']);
Route::post('add-book', [BookController::class, 'store']);
Route::get('edit-book/{id}', [BookController::class, 'edit']);
Route::put('update-book/{id}', [BookController::class, 'update']);
Route::get('delete-book/{id}', [BookController::class, 'delete']);

Route::get('bookuser', [BookController::class, 'index2']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('books', [BookController::class, 'index']);
});

Route::group(['middleware' => 'user'], function(){
    Route::get('bookuser', [BookController::class, 'index2']);
});