<x-layouts.client>
    <div class="card">
        <img src="{{ asset('assets/cryptocurrency-7156877_640.webp') }}" class="card-img-top" alt="...">
        <h5 class="card-header">Update Your Profile Information</h5>
        <div class="card-body">
            <form method="post" action="{{ route('client.change-name') }}">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">UserName</label>
                    <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Submit')">Submit?</button>
                <button type="reset" class="btn btn-info">Cancel</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Change Password
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('client.change-password') }}">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Current Password</label>
                    <input name="current_password" type="password" class="form-control" placeholder="current password">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">New Password</label>
                    <input name="new_password" type="password" class="form-control" placeholder="new password">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Confirm New Password</label>
                    <input name="new_password_confirmation" type="password" class="form-control" placeholder="new password">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Proceed?')">Change</button>
                <button type="reset" class="btn btn-info">Cancel</button>
            </form>
        </div>
    </div>
    @if(!ProfileFacade::fetchWalletAddress(auth()->id()))
        <div class="card">
        <div class="card-header">
            Set up Wallet Address
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('client.store-wallet-address') }}">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Wallet Address</label>
                    <input name="address" type="text" class="form-control" placeholder="wallet address">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Proceed?')">Add</button>
                <button type="reset" class="btn btn-info">Cancel</button>
            </form>
        </div>
    </div>
    @else
        <div class="card">
            <div class="card-header">
                Update Wallet Address
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('client.update-wallet-address') }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="" class="form-label">Current Wallet Address</label>
                        <input name="address" type="text" class="form-control" value="{{ ProfileFacade::fetchWalletAddress(auth()->id()) }}">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Proceed?')">Change</button>
                    <button type="reset" class="btn btn-info">Cancel</button>
                </form>
            </div>
        </div>
    @endif
</x-layouts.client>
