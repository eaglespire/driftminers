{{--3022779703--}}
<div class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" id="transactionModal_{{ $transaction->id }}">
    <div class="modal-dialog modal-xl modal-dialog-centered ">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title text-white font-weight-bold">{{__('History of transaction')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-horizontal-xl">
                    <li class="list-group-item flex-fill list-group-item-primary">id: {{ $transaction->id }}</li>
                    <li class="list-group-item flex-fill list-group-item-primary">type: {{ $transaction->type }}</li>
                    <li class="list-group-item flex-fill list-group-item-primary">status: {{ $transaction->status }}</li>
                    <li class="list-group-item flex-fill list-group-item-primary">amount: ${{ number_format($transaction->amount,2) }}</li>
                    <li class="list-group-item flex-fill list-group-item-primary">date: {{ $transaction->created_at->toFormattedDateString() }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
