<x-layouts.client>
    <div class="card">
        <img src="{{ asset('assets/cryptocurrency-7156877_640.webp') }}" class="card-img-top" alt="...">
        <h5 class="card-header">Request funds withdrawal</h5>
        <div class="card-body">
            <div class="card-text">
                <p>Wallet Balance: $ {{ number_format(WalletFacade::currentBalance(auth()->id()),2) }} </p>
                @if($status)
                    <p class="text-danger">You have a pending withdrawal request already!</p>
                @endif
            </div>
            <form method="{{ !$status ? 'post' : null }}" action="{{ !$status ? route('client.process-withdrawal') : null }}">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Amount</label>
                    <input required type="number" class="form-control" name="amount" placeholder="Amount to withdraw" {{ $status ? 'disabled' : null }}>
                    <small class="text-muted">Amount cannot be greater than your current wallet balance</small>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Cryptocurrency</label>
                    <input required type="text" class="form-control" name="cryptocurrency_type" placeholder="Type of Cryptocurrency" {{ $status ? 'disabled' : null}}>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Wallet Address</label>
                    <input required type="text" class="form-control" name="wallet_address" placeholder="Your wallet address" {{ $status ? 'disabled' : null }}>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Send Withdrawal Request?')" {{ $status ? 'disabled' : null }}>Request Withdrawal</button>
                <button type="reset" class="btn btn-info" {{ $status ? 'disabled' : null }}>Cancel</button>
            </form>
        </div>
    </div>
</x-layouts.client>
