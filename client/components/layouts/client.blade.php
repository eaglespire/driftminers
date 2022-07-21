<x-layouts.client-master>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-4 col-sm-12">
            {{ $slot }}
        </div>
        <div class="col-lg-7 col-md-8 col-sm-12">
            <div class="card-columns">
                <div class="card">
                    <img src="{{ asset('assets/bitcoin-6985363_640.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('client.welcome') }}" class="btn btn-outline-primary stretched-link btn-block">
                            <i class="fas fa-long-arrow-alt-left"></i> Home Page
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/drawing-pin-147814.svg') }}" class="card-img-top" alt="...">
                    <div class="card-header bg-primary">
                        <h5 class="card-title">Push the boundaries with {{ config('app.name') }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{ config('app.name') }} allows you to mine cryptocurrencies without purchasing and maintaining hardware
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/graph-5459687.svg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Our Plans</h5>
                        <p class="card-text">
                            You can choose a contract for mining the desired cryptocurrency and track this process on these platform.
                            It is also possible to withdraw money in a convenient currency
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/non-fungible-token-7252677.svg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ config('app.name') }} Wallet Address</h5>
                    </div>
                    <div class="card-footer bg-primary">
                        <h5 class="card-text text-white-50">
                            2748400002--2
                        </h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.client-master>
