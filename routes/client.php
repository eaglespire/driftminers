<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\BtcAddressController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/client/home/', [ ClientController::class,'welcome' ])->name('client.welcome');
Route::get('/client/home/profile', [ ClientController::class,'profile' ])->name('client.profile');
Route::get('/client/home/settings', [ ClientController::class,'settings' ])->name('client.settings');
Route::get('/client/home/active-plan', [ ClientController::class,'activePlan' ])->name('client.active-plan');
Route::get('/client/home/withdrawal', [ ClientController::class,'withdrawal' ])->name('client.withdrawal');
Route::get('/client/home/all-plans', [ ClientController::class,'allPlans' ])->name('client.all-plans');
Route::get('/client/home/account-balance', [ ClientController::class,'accountBalance' ])->name('client.account-balance');
Route::get('/client/home/notifications', [ ClientController::class,'notifications' ])->name('client.notifications');
Route::get('/client/home/transactions', [ ClientController::class,'transactions' ])->name('client.transactions');
Route::get('/client/home/subscribe', [ ClientController::class,'subscribe' ])->name('client.subscribe');
Route::post('/client/home/subscribe', [ ClientController::class,'subscribeToPlan' ])->name('subscribe_to_plan');
Route::post('/client/home/deposit', [ ClientController::class,'makeDeposit' ])->name('make_deposit');

Route::post('/client/home/update-password', [ ChangePasswordController::class,'changePassword' ])->name('client.change-password');
Route::post('/client/home/update-name', [ ProfileController::class,'updateProfile' ])->name('client.change-name');
Route::post('/client/home/create-wallet-address', [ BtcAddressController::class,'store' ])->name('client.store-wallet-address');
Route::put('/client/home/update-wallet-address', [ BtcAddressController::class,'update' ])->name('client.update-wallet-address');

Route::post('/client/home/withdrawal', [ ClientController::class,'processWithdrawal' ])->name('client.process-withdrawal');

