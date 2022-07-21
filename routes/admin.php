<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/drift/miners/admin/profile', [ AdminController::class,'home' ])->name('admin_home');
Route::get('/drift/miners/admin/plans/create',[ AdminController::class,'create_plans' ])->name('create_plans');
Route::get('/drift/miners/admin/plans',[ AdminController::class,'all_plans' ])->name('all_plans');
Route::post('/drift/miners/admin/plans',[ AdminController::class,'store_plan' ])->name('store_plan');
Route::get('/drift/miners/admin/plans/{id}/edit', [ AdminController::class,'edit_plan' ])->name('edit_plan');
Route::put('/drift/miners/admin/plans/{id}/update', [ AdminController::class,'update_plan' ])->name('update_plan');
Route::delete('/drift/miners/admin/plans/{id}', [ AdminController::class,'delete_plan' ])->name('delete_plan');

Route::get('/drift/miners/admin/subscribers', [ AdminController::class,'subscribers' ])->name('subscribers');
Route::get('/drift/miners/admin/subscribers/{id}', [ AdminController::class,'subscriber' ])->name('subscriber');
Route::get('/drift/miners/admin/deposits/unapproved', [ AdminController::class,'unapprovedDeposits' ])->name('unapproved_deposits');
Route::get('/drift/miners/admin/deposits/approved', [ AdminController::class,'approvedDeposits' ])->name('approved_deposits');
Route::post('/drift/miners/admin/subscribers/{id}', [ AdminController::class,'activateSubscription' ])->name('activate_subscription');
Route::delete('/drift/miners/subscribers/{id}', [ AdminController::class,'cancelSubscription' ])->name('cancel_subscription');
Route::delete('/drift/miners/subscribers/reject/{id}', [ AdminController::class,'rejectSubscriptionRequest' ])->name('reject_subscription');
Route::put('/drift/miners/admin/profit/{id}', [ AdminController::class,'setDailyProfit' ])->name('update_user_wallet');

Route::get('/drift/miners/admin/users', [ AdminController::class,'users' ])->name('users.all');
Route::get('/drift/miners/admin/users/create', [ AdminController::class,'createUser' ])->name('users.create');
Route::post('/drift/miners/admin/users', [ AdminController::class,'storeUser' ])->name('users.store');
Route::get('/drift/miners/admin/users/{id}/edit', [ AdminController::class,'editUser' ])->name('users.edit');
Route::put('/drift/miners/admin/users/{id}/update', [ AdminController::class,'updateUser' ])->name('users.update');
Route::delete('/drift/miners/admin/users/{id}', [ AdminController::class,'deleteUser' ])->name('users.destroy');
