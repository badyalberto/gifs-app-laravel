<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GifsController;
use Illuminate\Support\Facades\Auth;
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


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/upload',[GifsController::class,'upload']);
    Route::post('/store',[GifsController::class,'store']);
});

Route::get('/',[GifsController::class,'index']);
Route::get('/categories',[CategoryController::class,'filter']);
Route::get('/search',[GifsController::class,'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
