<div class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" id="editCurrentBalance">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark">Edit Current Balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update_user_wallet_from_admin') }}" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="userId" value="{{ $subscriber->user->id }}">
                    <div class="form-group">
                        <label for="" class="form-label text-dark">Edit Balance</label>
                        <input name="amount" type="text" class="form-control" value="{{ WalletFacade::currentBalance($subscriber->user->id) }}">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
