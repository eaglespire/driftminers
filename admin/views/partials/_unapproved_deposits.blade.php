<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead class="bg-primary">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Minimum Amount (in $)</th>
                        <th scope="col">ROI(in %)</th>
                        <th scope="col">Amount to pay (in $)</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @if(count($deposits) != 0)
                        <tbody>
                        @foreach($deposits as $deposit)
                            <tr>
                                <td>{{ $deposit->user->name }}</td>
                                <td>{{ $deposit->user->email }}</td>
                                <td>{{ $deposit->plan->name }}</td>
                                <td>{{ number_format($deposit->plan->minimum_investment,2) }}</td>
                                <td>{{ $deposit->plan->roi }}</td>
                                <td>{{ number_format($deposit->amount,2) }}</td>
                                <td>
                                    <a href="" class="btn btn-primary" style="margin-bottom: 2px">Confirm</a>
                                    <a href="" class="btn btn-danger mt-1 mt-md-1  mt-lg-1 mt-xl-0">Cancel</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
