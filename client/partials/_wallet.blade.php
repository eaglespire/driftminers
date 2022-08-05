{{--<div class="card bg-dark">--}}
{{--    <img width="100" height="100" src="{{ asset('assets/purse-2026844.svg') }}" class="card-img-top rounded-circle" alt="...">--}}
{{--    <div class="card-body text-center">--}}
{{--        <h5 class="card-text">Your WalletFacade Balance</h5>--}}
{{--        <p class="card-text">--}}
{{--            $ {{ number_format(UserWallet::currentBalance(auth()->id())) }}--}}
{{--        </p>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="card">
    <img src="{{ asset('/assets/crypto2/credit-card-5459711_640.webp') }}" class="card-img-top" alt="...">
    <h5 class="card-header">Wallet Balance</h5>
    <div class="card-body">
        <p class="card-text">
            Your Wallet Balance Is
        </p>
        <a href="#" class="btn btn-primary btn-block">
            $ {{ number_format(WalletFacade::currentBalance(auth()->id())) }}
        </a>
    </div>
</div>

