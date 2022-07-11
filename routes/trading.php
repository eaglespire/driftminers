<?php

use Illuminate\Support\Facades\Route;
use Themes\Frontend\Controllers\PlanController;

//Route::get('/home/')
 Route::get('/drift/miners/plans', [ PlanController::class,'index' ] )->name('plans');
 Route::get('/drift/miners/deposits', [ PlanController::class,'deposit' ])->name('deposit');
 Route::get('/drift/miners/withdrawal', [ PlanController::class,'withdrawal' ])->name('withdrawal');
 Route::get('/drift/miners/bonuses', [ PlanController::class,'bonuses' ])->name('bonuses');
