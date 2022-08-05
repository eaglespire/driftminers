<x-layouts.client>
    <div class="card bg-primary">
        <h6 class="card-header">{{__('Transaction history')}}</h6>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <caption>
                        {{ $transactions->links() }}
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">{{__('S/N')}}</th>
                        <th scope="col">{{__('Type')}}</th>
                        <th scope="col">{{__('Status')}}</th>
                        <th scope="col">{{__('Amount')}}</th>
                        <th scope="col">{{__('Date')}}</th>
                    </tr>
                    </thead>
                    @if($transactions->isNotEmpty())
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                <th scope="row">{{ $loop->index +1 }}</th>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>$ {{ number_format($transaction->amount,2) }}</td>
                                <td>{{ $transaction->created_at->toFormattedDateString() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</x-layouts.client>
