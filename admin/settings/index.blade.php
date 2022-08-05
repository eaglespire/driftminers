<x-layouts.master>
    <x-slot:pageTitle>
        Settings | {{ config('app.name') }}
    </x-slot:pageTitle>
    <x-slot:header>
        Settings | All Settings
    </x-slot:header>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card bg-primary">
                <h5 class="card-header">Update Your Profile Information</h5>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.settings.profile') }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">UserName</label>
                            <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}">
                        </div>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Submit')">Submit</button>
                        <button type="reset" class="btn btn-info">Cancel</button>
                    </form>
                </div>
            </div>
            <div class="card bg-primary">
                <div class="card-header">
                    Change Password
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.settings.password') }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="" class="form-label">Current Password</label>
                            <input value="{{ old('current_password') }}" name="current_password" type="password" class="form-control" placeholder="current password">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">New Password</label>
                            <input name="new_password" type="password" class="form-control" placeholder="new password">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Confirm New Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control" placeholder="new password">
                        </div>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Proceed?')">Change</button>
                        <button type="reset" class="btn btn-info">Cancel</button>
                    </form>
                </div>
            </div>
            @if($btcAddress)
               @include('partials.updates._update_wallet_address')
            @else
                @include('partials.updates._store_wallet_address')
            @endif
        </div>
    </div>
</x-layouts.master>
