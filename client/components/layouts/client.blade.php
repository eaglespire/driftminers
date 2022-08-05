<x-layouts.client-master>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-9 col-sm-12">
            @include('messages')
            <div class="card mb-4 mt-2">
                <img src="{{ asset('assets/bitcoin-6985363_640.webp') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{ route('client.welcome') }}" class="btn btn-outline-primary stretched-link btn-block">
                        <i class="fas fa-long-arrow-alt-left"></i> Home Page
                    </a>
                </div>
            </div>
            {{ $slot }}
        </div>
    </div>
</x-layouts.client-master>
