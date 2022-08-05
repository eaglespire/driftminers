<div class="card bg-primary">
    <h5 class="card-header">Update Wallet Address</h5>
    <div class="card-body">
        <form method="post" action="{{ route('admin.settings.btc.update') }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="" class="form-label">Wallet Address</label>
                <input type="text" class="form-control" name="address" value="{{ $btcAddress }}">
            </div>
            <button type="submit" class="btn btn-success" onclick="return confirm('Submit')">Update</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>
