<div class="table-responsive">
    <table class="table">
        <caption>
            {{ $transactions->links() }}
        </caption>
        <thead>
        <tr>
            <th scope="col">{{__('Type')}}</th>
            <th scope="col">{{__('Date')}}</th>
            <th scope="col">{{__('Action')}}</th>
        </tr>
        </thead>
        @if($transactions->isNotEmpty())
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->created_at->toFormattedDateString() }}</td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#transactionModal_{{ $transaction->id }}">
                            <i class="fas fa-eye"></i> {{__('View')}}
                        </button>
                    </td>
                </tr>
                @include('partials._transaction_history_modal')
            @endforeach
            </tbody>
        @endif
    </table>

</div>
