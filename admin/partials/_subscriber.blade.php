<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card-columns">
            <div class="card bg-primary">
                <h5 class="card-header">{{__('Transaction History')}}</h5>
                <div class="card-body">
                    @include('partials._transaction')
                </div>
            </div>
            <div class="card bg-primary">
                <div class="card-body">
                    <h5 class="card-title">User Details</h5>
                    <p class="card-text">Name - {{ $subscriber->user->name }}</p>
                    <p class="card-text">Email - {{ $subscriber->user->email }}</p>
                    <p class="card-text">Date Registered - {{ $subscriber->user->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
            <div class="card bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Current Plan</h5>
                    <p class="card-text"><small class="text-white-50">{{ SubscriptionFacade::planName($subscriber->user->id) }}</small></p>
                    <p class="card-title">Return On Investment(ROI)</p>
                    <p class="card-text"><small class="text-white-50">{{ $subscriber->plan->roi }} %</small></p>
                    <p class="card-title">Minimum Investment</p>
                    <p class="card-text"><small class="text-white-50">$ {{ number_format($subscriber->plan->minimum_investment) }}</small></p>
                    <p class="card-title">Description</p>
                    <p class="card-text"><small class="text-white-50">{{ $subscriber->plan->description }}</small></p>
                </div>
            </div>
            <div class="card bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Last Mining Date</h5>
                    <p class="card-text"><small class="text-white-50">{{ WalletFacade::lastMiningDate($subscriber->user->id) }}</small></p>
                </div>
            </div>
            <div class="card bg-primary">
                <img src="{{ asset('assets/crypto2/cartoon-7031973_640.webp') }}" class="card-img" alt="...">
            </div>
            <div class="card p-3 bg-primary">
                @include('partials.updates._edit_balance')
                <div class="card-body">
                    <h5 class="card-title">Current Balance</h5>
                    <p class="card-text">
                        <small class="text-white-50">$ {{ number_format(WalletFacade::currentBalance($subscriber->user->id),2) }}</small>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editCurrentBalance">
                            <i class="fas fa-edit"></i> edit
                        </button>
                    </p>
                </div>
            </div>
            <div class="card bg-primary">
                <h5 class="card-header">Mining</h5>
                <div class="card-body">
                    <div class="btn-group" role="group">
                        <div class="row">
                            @for($i=1; $i <= $subscriber->plan->duration; $i++)
                                <div class="col-lg-6 col-sm-12 my-1 ">
                                    <form action="{{ route('update_user_wallet', $subscriber->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="mining_date_value" value="{{ $i }}">
                                        <input type="hidden" name="last_mining_date" value="{{ $subscriber->start_date->addDays($i) }}">
                                        @if(WalletFacade::getLastMiningDate($subscriber->user->id) != null)
{{--                                            <button @if(WalletFacade::getLastMiningDate($subscriber->user->id)->toFormattedDateString() == $subscriber->start_date->addDays($i)->toFormattedDateString()) disabled @endif  class="btn btn-warning mx-1" type="submit" onclick="return confirm('Are You Sure You Want To Proceed?')">--}}
{{--                                                Mine for {{ $subscriber->start_date->addDays($i)->toFormattedDateString() }}--}}
{{--                                            </button>--}}
                                            <button {{ already_mined($subscriber->user->id,$i) }} class="btn btn-success mx-1" type="submit" onclick="return confirm('Are You Sure You Want To Proceed?')">
                                                Mine for {{ $subscriber->start_date->addDays($i)->toFormattedDateString() }}
                                            </button>
                                        @else
                                            <button class="btn btn-success mx-1" type="submit" onclick="return confirm('Are You Sure You Want To Proceed?')">
                                                Mine for {{ $subscriber->start_date->addDays($i)->toFormattedDateString() }}
                                            </button>
                                        @endif

                                    </form>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
