<div class="card bg-dark">
    <img width="100" height="100" src="{{ asset('assets/purse-2026844.svg') }}" class="card-img-top rounded-circle" alt="...">
    <div class="card-body text-center">
        <h5 class="card-text">Your Wallet Balance</h5>
        <p class="card-text">
            $ {{ number_format(UserWallet::currentBalance(auth()->id())) }}
        </p>
    </div>
</div>
