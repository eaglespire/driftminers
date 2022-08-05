<x-layouts.master>
    <x-slot:pageTitle>
        Messages | {{ config('app.name') }}
    </x-slot:pageTitle>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cryptocurrency</th>
                        <th scope="col">Address & Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @if(count($withdrawals) != 0)
                    <tbody>
                    @foreach($withdrawals as $withdrawal)
                        <tr>
                            <th class="align-middle" scope="row">{{ $loop->index + 1  }}</th>
                            <td class="align-middle">
                                @if($withdrawal->user->subscriber == null)
                                <a href="{{ route('users.show',$withdrawal->user->id) }}" class="text-white" style="text-decoration: underline">
                                    {{ $withdrawal->user->email }}
                                </a>
                                @else
                                    <a href="{{ route('subscriber', $withdrawal->user->subscriber->id) }}" class="text-white" style="text-decoration: underline">
                                        {{ $withdrawal->user->email }}
                                    </a>
                                @endif
                            </td>
                            <td class="align-middle">{{ $withdrawal->cryptocurrency_type }}</td>
                            <td class="align-middle">
                                {{ $withdrawal->wallet_address }} <br>
                                <small>Date : {{ $withdrawal->created_at->toFormattedDateString() }}</small>
                            </td>
                            <td class="align-middle">$ {{ number_format($withdrawal->amount,2) }}</td>
                            <td class="align-middle">
                                <div class="btn-group">
                                    @if(!WithdrawalFacade::withdrawalApproved($withdrawal->user->id))
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#declined_withdrawal_{{ $withdrawal->id }}">
                                        Decline
                                    </a>
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#accept_withdrawal_{{ $withdrawal->id }}">
                                        Accept
                                    </a>
                                    @else
                                    <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#pay_client_{{ $withdrawal->id }}">
                                        Pay Client
                                    </a>
                                    @endif
                                </div>
                            </td>
                            @include('partials._declined_withdrawal')
                            @include('partials._accept_withdrawal')
                            @include('partials._pay_client')
                    </tr>
                    @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>

    </div>
</x-layouts.master>



