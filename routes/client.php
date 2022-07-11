<?php

use Client\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/client/home/profile', [ ClientController::class,'profile' ])->name('client_profile');
Route::get('/client/home/bonuses', [ ClientController::class,'bonuses' ])->name('client_bonus');
Route::get('/client/home/withdrawal', [ ClientController::class,'withdrawal' ])->name('client_withdrawal');
Route::get('/client/home/deposit', [ ClientController::class,'deposit' ])->name('client_deposit');
Route::get('/client/home/plans', [ ClientController::class,'plans' ])->name('client_plans');

Route::post('/client/home/subscribe', [ ClientController::class,'subscribeToPlan' ])->name('subscribe_to_plan');
Route::post('/client/home/deposit', [ ClientController::class,'makeDeposit' ])->name('make_deposit');
