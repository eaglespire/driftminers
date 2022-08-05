<div class="modal fade " tabindex="-1" id="pay_client_{{ $withdrawal->id }}" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title">Pay Now?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('withdrawal.pay') }}" method="post">
                    @csrf
                    <input type="hidden" name="userId" value="{{ $withdrawal->user->id }}">
                    <div class="form-group">
                        <label for="" class="form-label">Message Client</label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
