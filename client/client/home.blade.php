<x-layouts.client-master>
    <x-slot:pageTitle>
       Welcome to {{ config('app.name') }}
    </x-slot:pageTitle>

    <div class="row justify-content-center align-items-center">
        <div class="col-xl-8 col-md-10 col-sm-12">
            <div class="card-columns">
                <div class="card">
                    <img src="{{ asset('assets/non-fungible-token-7252677.svg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ config('app.name') }} Wallet Address</h5>
                    </div>
                    <div class="card-footer bg-primary">
                        <h5 class="card-text text-white text-center">
                            {{ ProfileFacade::fetchAdminBTCAddress() }}
                        </h5>
                    </div>
                </div>
                @if(SubscriptionFacade::subscriptionIsActive(auth()->id()))
                    <div class="card">
                        <img src="{{ asset('assets/bitcoin.gif') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <button class="btn btn-success btn-block">
                                <i class="fab fa-bitcoin"></i> Mining In Action ...
                            </button>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <img src="{{ asset('/assets/marketing-4646598_640.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-grid">
                            <a href="{{ route('client.account-balance') }}" class="btn-block btn btn-link stretched-link">Account Balance</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/man-157699_640.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-grid">
                            <a href="{{ route('client.profile') }}" class="btn-block btn btn-link stretched-link">My Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('/assets/atm-7212428_640.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-grid">
                            <a href="{{ route('client.withdrawal') }}" class="btn btn-link stretched-link">Make Withdrawals</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/target-4859140.svg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-grid">
                            <a href="{{ route('client.active-plan') }}" class="btn-block btn btn-link stretched-link">{{ __('Active Plan') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/cryptocurrency-7156877_640.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('client.subscribe') }}" class="w-100 btn btn-link stretched-link">{{__('Subscribe to a plan')}}</a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/credit-card-6400886_640.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('client.transactions') }}" class="btn-block btn btn-link stretched-link">{{__('Transaction History')}}</a>
                    </div>
                </div>
{{--                <div class="card">--}}
{{--                    <img src="{{ asset('assets/bell-jar-1096280.svg') }}" class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <a href="{{ route('client.notifications') }}" class="btn-block btn btn-link stretched-link">{{__('Notifications')}}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card">
                    <img src="{{ asset('assets/training-5822607_640.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('client.all-plans') }}" class="btn-block btn btn-link stretched-link">{{__('All Plans')}}</a>
                    </div>
                </div>
{{--                <div class="card">--}}
{{--                    <img src="{{ asset('assets/gear-1077550.svg') }}" class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <a href="{{ route('client.settings') }}" class="btn-block btn btn-link stretched-link">{{__('Settings')}}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

</x-layouts.client-master>
