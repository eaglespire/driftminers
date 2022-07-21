<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,'landing'])->name('landing');
Route::get('/about', [FrontendController::class,'about'])->name('about');
Route::get('/faq',[ FrontendController::class,'faq' ])->name('faq');
Route::get('/privacy-policy', [ FrontendController::class,'privacy' ])->name('privacy');
Route::get('/terms-and-conditions', [ FrontendController::class,'terms' ])->name('terms');
Route::get('/contact', [ FrontendController::class,'contact' ])->name('contact');
Route::get('/our-plans', [ FrontendController::class,'plans' ])->name('plans');
Route::get('/offline', [ FrontendController::class,'offline' ])->name('offline');
