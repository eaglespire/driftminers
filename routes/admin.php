<?php

use App\Http\Controllers\Admin\AdminLogicController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BtcAddressController;
use Illuminate\Support\Facades\Route;


Route::controller(PageController::class)->prefix('drift/miners/admin')->group(function (){
    Route::get('profile',  'home' )->name('admin_home');
    Route::get('plans/create','createPlansPage' )->name('create_plans');
    Route::get('plans','allPlansPage' )->name('all_plans');
    Route::get('plans/{id}/edit', 'editPlanPage' )->name('edit_plan');
    Route::get('subscribers', 'subscribersPage' )->name('subscribers');
    Route::get('subscribers/{id}', 'subscriberPage' )->name('subscriber');
    Route::get('users', 'usersPage' )->name('users.all');
    Route::get('users/create', 'createUserPage' )->name('users.create');
    Route::get('users/{id}/edit', 'editUserPage' )->name('users.edit');
    Route::get('users/{id}', 'showUserPage' )->name('users.show');
    Route::get('messages', 'messagesPage' )->name('messages.index');
    Route::get('settings','settingsPage')->name('settings.index');
});
Route::controller(AdminLogicController::class)->prefix('drift/miners/admin')->group(function (){
    Route::post('plans','store_plan' )->name('store_plan');
    Route::put('plans/{id}/update', 'update_plan' )->name('update_plan');
    Route::delete('plans/{id}', 'delete_plan' )->name('delete_plan');
    Route::post('subscribers/{id}', 'activateSubscription' )->name('activate_subscription');
    Route::delete('subscribers/{id}', 'cancelSubscription' )->name('cancel_subscription');
    Route::delete('subscribers/reject/{id}','rejectSubscriptionRequest' )->name('reject_subscription');
    Route::put('profit/{id}', 'miningFunction' )->name('update_user_wallet');
    Route::put('user_wallet/update', 'updateUserWallet' )->name('update_user_wallet_from_admin');
    Route::post('users', 'storeUser' )->name('users.store');
    Route::put('users/{id}/update', 'updateUser' )->name('users.update');
    Route::delete('users/{id}', 'deleteUser' )->name('users.destroy');
    Route::post('reject-withdrawal', 'rejectWithdrawal' )->name('withdrawal.reject');
    Route::post('accept-withdrawal', 'acceptWithdrawal' )->name('withdrawal.accept');
    Route::post('pay-now', 'payNow' )->name('withdrawal.pay');
});

Route::prefix('drift/miners/admin')->name('admin.')->group(function (){
    Route::put('settings/profile', [ ProfileController::class,'updateProfile' ])->name('settings.profile');
    Route::put('settings/password', [ ChangePasswordController::class,'changePassword' ])->name('settings.password');
    Route::post('settings/btc-address', [ BtcAddressController::class ,'store'])->name('settings.btc.store');
    Route::put('settings/btc-address', [ BtcAddressController::class,'update' ])->name('settings.btc.update');
});



