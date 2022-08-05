<x-layouts.master>
    <x-slot:pageTitle>
        Users | View User
    </x-slot:pageTitle>
    <x-slot:header>
        Users | View User
    </x-slot:header>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-columns">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h5 class="card-header">{{__('Transaction History')}}</h5>
                        <div class="card-body">
                            @include('partials._transaction')
                        </div>
                    </div>
                </div>
                <div class="card bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">User Details</h5>
                        <p class="card-text">Name - {{ $user->name }}</p>
                        <p class="card-text">Email - {{ $user->email }}</p>
                        <p class="card-text">Date Registered - {{ $user->created_at->toFormattedDateString() }}</p>
                    </div>
                </div>

                <div class="card bg-primary">
                    <img src="{{ asset('assets/crypto2/cartoon-7031973_640.webp') }}" class="card-img" alt="...">
                </div>
                <div class="card bg-primary">
                    <img src="{{ asset('assets/crypto2/bitcoin-4851376-copy.webp') }}" class="card-img" alt="...">
                </div>
                <div class="card p-3 bg-primary">
                    @include('partials.updates._edit_balance_user')
                    <div class="card-body">
                        <h5 class="card-title">Current Balance</h5>
                        <p class="card-text">
                            <small class="text-white-50">$ {{ number_format(WalletFacade::currentBalance($user->id),2) }}</small>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editCurrentBalance">
                                <i class="fas fa-edit"></i> edit
                            </button>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layouts.master>
