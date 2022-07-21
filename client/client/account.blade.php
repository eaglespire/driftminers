<x-layouts.client>
    <div class="card">
        <img src="{{ asset('/assets/crypto2/credit-card-5459711_640.webp') }}" class="card-img-top" alt="...">
        <h5 class="card-header">Wallet Balance</h5>
        <div class="card-body">
            <p class="card-text">
                Your Wallet Balance Is
            </p>
            <a href="#" class="btn btn-primary btn-block">
                $ {{ number_format(UserWallet::currentBalance(auth()->id())) }}
            </a>
        </div>
    </div>
</x-layouts.client>
