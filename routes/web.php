<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    
    Route::get('/account/all',[TwitterController::class,'index'])->name('twitter');
    Route::get('/account/add',[TwitterController::class,'add']);
    Route::post('/account/store',[TwitterController::class,'store'])->name('addAccount');
    Route::get('/account/edit/{id}',[TwitterController::class,'edit']);
    Route::post('/account/save/{id}',[TwitterController::class,'save']);
    Route::get('/post/all',[PostController::class,'index'])->name('post');
    Route::get('/post/add',[PostController::class,'add']);
    Route::post('/post/store',[PostController::class,'store'])->name('addTweet');
    
});