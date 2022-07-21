<?php

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

use WisdomDiala\Cryptocap\Facades\Cryptocap;
use Carbon\Carbon;

require __DIR__.'/frontend.php';
require __DIR__ .'/client.php';
require __DIR__.'/auth.php';
require __DIR__.'/trading.php';
require __DIR__.'/admin.php';

Route::get('/drift/mark-as-read', function (){
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('mark-as-read');

//Route::get('/home/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alpine', function (){
    //\RealRashid\SweetAlert\Facades\Alert::success('Success');
    //dd(Cryptocap::getSingleAsset('ethereum')->data);
//    return \App\Models\User::whereId(2)->update(['name'=>'Emeka Rollas']);
    $user = \App\Models\User::whereId(3)->first();
//    return $user->update(['name'=>'Rita Ohwofasa']);
//    return \App\Models\User::find(2);
    $data = [
        'title'=>'Welcome to '.config('app.name'),
        'body'=>'Thank You for registering. We are glad to have you with us',
        'action'=>'Please, kindly click on the link below to proceed further',
        'url'=>'Follow this url.'.url('http://127.0.0.1:8000'),
        'thankyou'=>'Thanks for dropping by'
    ];
//    $users = \App\Models\User::admins()->get();
//    foreach ($users as $user){
//        \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\NewDepositMailForAdmin());
//    }


//    $mining = new \App\Services\MiningServices(5,2500,15,1);
//    return $mining->getCompoundAmount();
   // return $miningServices->getCompoundAmount();
//    $user = \App\Models\User::first();
//    \App\Jobs\WelcomeMailJob::dispatch($user,$data);
  //return 'success';
    $currentDate = Carbon::now()->addDays(3);
    $user = \App\Models\Subscription::first();

    //echo gettype($user->start_date);
    $roi = 5;
    $duration = 3;
    $investment = 2500;
    $interest = ($investment * $roi * $duration) / 100;
    //return $interest;
    //$user->notify(new \App\Notifications\WelcomeMessageNotification($data));
   return view('test');
});
Route::get('/clear', function (){
   \Illuminate\Support\Facades\Artisan::call('cache:clear');
   return true;
});
Route::get('/testing', function (){
    $admins = \App\Models\User::where('is_admin',1)->get();
    dd($admins);
    Greeting::something(234);
});

class Greeting{
    public static function __callStatic(string $method, array $arguments)
    {
        return (self::resolveFacade($method))->$method(...$arguments);
    }
    protected static function resolveFacade($name)
    {
        return app()[$name];
    }
}


