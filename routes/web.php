<?php

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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/election/data', [App\Http\Controllers\ElectionController::class, 'index'])->name('election.data');
Route::get('election/{candidate}/votes', [App\Http\Controllers\ElectionController::class, 'candidate_votes'])->name('cantidates.votes');
Route::POST('/vote/store', [App\Http\Controllers\HomeController::class, 'store'])->name('vote.store');

Route::get('/otp/create', [App\Http\Controllers\OtpController::class, 'create'])->name('otp.create');
Route::get('/otp/veriry', [App\Http\Controllers\OtpController::class, 'veriry'])->name('otp.verify');




Auth::routes();
