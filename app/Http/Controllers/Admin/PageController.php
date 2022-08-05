<?php

namespace App\Http\Controllers\Admin;

use App\Facades\PlanFacade;
use App\Facades\ProfileFacade;
use App\Facades\SubscriptionFacade;
use App\Facades\TransactionHistoryFacade;
use App\Facades\UserFacade;
use App\Facades\WithdrawalFacade;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role.admin']);
    }

    public function home()
    {
        $boxes = collect([
            (object) [
                'id'=>1,
                'title'=>'Users',
                'count'=>UserFacade::usersCount() ,
                'url'=>'users.all',
                'color'=>'bg-primary',
            ],
            (object) [
                'id'=>2,
                'title'=>'Subscribers',
                'count'=>count(UserFacade::allSubscribers()) ,
                'url'=>'subscribers',
                'color'=>'bg-warning',
            ],
            (object) [
                'id'=>3,
                'title'=>'Plans',
                'count'=>count(UserFacade::allPlans()) ,
                'url'=>'all_plans',
                'color'=>'bg-success',
            ],
            (object) [
                'id'=>4,
                'title'=>'Withdraw Requests',
                'count'=>count(UserFacade::allWithdrawRequests()) ,
                'url'=>'messages.index',
                'color'=>'bg-secondary',
            ],
        ]);
        return view('admin_home', [
            'boxes'=>$boxes,
            'totalUsers'=>UserFacade::usersCount(),
            'totalSubscribers'=>count(UserFacade::allSubscribers()),
            'totalPlans'=> count(UserFacade::allPlans()),
            'totalWithdrawals'=>count(UserFacade::allWithdrawRequests())
        ]);
    }
    public function createPlansPage()
    {
        return view('plans.create_plans');
    }

    public function allPlansPage()
    {
        return view('plans.all_plans', [
            'plans'=>PlanFacade::all()
        ]);
    }
    public function editPlanPage($planId)
    {
        return view('plans.edit_plan',[
            'plan'=>PlanFacade::getSinglePlan($planId)
        ]);
    }

    public function subscribersPage()
    {
        return view('subscribers.subscribers',[
            'subscribers'=>SubscriptionFacade::getSubscribedUsers()
        ]);
    }
    public function subscriberPage($subscriberId)
    {
          $subscriber = SubscriptionFacade::getSubscribedUser($subscriberId);
        if (UserFacade::getSubscriber($subscriberId)){
            return view('subscribers.subscriber', [
                'subscriber'=>SubscriptionFacade::getSubscribedUser($subscriberId),
                'transactions'=>TransactionHistoryFacade::histories($subscriber->user->id)
            ]);
        }
        return redirect(route('admin_home'))->with('error','Subscriber Does Not Exist');
    }

    public function editUserPage($id)
    {
        return view('users.edit',['user'=>UserFacade::getUser($id)]);
    }
    public function usersPage()
    {
        return view('users.all',[
            'users'=>UserFacade::allUsers()
        ]);
    }
    public function createUserPage()
    {
        return view('users.create');
    }
    public function showUserPage($id)
    {
        //dd(UserFacade::getUser($id));
        return view('users.show',[
            'user'=>UserFacade::getUser($id),
            'transactions'=>TransactionHistoryFacade::histories($id)
        ]);
    }
    public function messagesPage()
    {
        return view('messages.index', [
            'withdrawals'=>WithdrawalFacade::allRequests()
        ]);
    }
    public function settingsPage()
    {
        return view('settings.index',[
            'btcAddress'=>ProfileFacade::fetchWalletAddress(auth()->id())
        ]);
    }
}
