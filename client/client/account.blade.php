<x-layouts.client>
    <div class="card">
        <img src="{{ asset('/assets/crypto2/credit-card-5459711_640.webp') }}" class="card-img-top" alt="...">
        <h5 class="card-header text-center">Wallet Balance</h5>
        <div class="card-body">
            <p class="card-text text-center">
                Your Wallet Balance Is
            </p>
            <a href="#" class="btn btn-primary btn-block">
                $ {{ number_format(WalletFacade::currentBalance(auth()->id())) }}
            </a>
        </div>
    </div>
</x-layouts.client>
