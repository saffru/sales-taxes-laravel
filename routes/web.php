<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Test1Controller;
use App\Http\Controllers\Test2Controller;
use App\Http\Controllers\Test3Controller;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [PostController::class, 'welcome'])->name('welcome');
Route::post('/post', [PostController::class, 'store'])->name('store');
Route::post('/confirm', [PostController::class, 'purchase'])->name('purchase');

Route::get('/test1', [Test1Controller::class, 'runTest']);
Route::get('/test2', [Test2Controller::class, 'runTest']);
Route::get('/test3', [Test3Controller::class, 'runTest']);
