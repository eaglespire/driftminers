<div class="card bg-primary">
    <h5 class="card-header">Setup Wallet Address</h5>
    <div class="card-body">
        <form method="post" action="{{ route('admin.settings.btc.store') }}">
            @csrf
            <div class="form-group">
                <label for="" class="form-label">Wallet Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
            <button type="submit" class="btn btn-success" onclick="return confirm('Submit')">Create</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>
