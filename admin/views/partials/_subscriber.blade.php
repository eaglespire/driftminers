<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card-columns">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transaction History</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card p-3">
                <blockquote class="blockquote mb-0 card-body">
                    <p>User Details</p>
                    <footer class="blockquote-footer">
                        <small class="text-muted">
                            Name - <cite title="Source Title">{{ $subscriber->user->name }}</cite>
                        </small>
                        <br>
                        <small class="text-muted">
                        Email -  <cite title="Source Title">{{ $subscriber->user->email }}</cite>
                        </small>
                        <br>
                        <small class="text-muted">
                            Date Registered - <cite title="Source Title">{{ $subscriber->user->created_at->toFormattedDateString() }}</cite>
                        </small>
                        <br>
                    </footer>
                </blockquote>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Current Plan</h5>
                    <p class="card-text"><small class="text-muted">{{ $subscriber->plan->name }}</small></p>
                    <p class="card-title">Return On Investment(ROI)</p>
                    <p class="card-text"><small class="text-muted">{{ $subscriber->plan->roi }} %</small></p>
                    <p class="card-title">Minimum Investment</p>
                    <p class="card-text"><small class="text-muted">$ {{ number_format($subscriber->plan->minimum_investment) }}</small></p>
                    <p class="card-title">Description</p>
                    <p class="card-text"><small class="text-muted">{{ $subscriber->plan->description }}</small></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Last Mining Date</h5>
                    <p class="card-text"><small class="text-muted">{{ UserWallet::lastMiningDate($subscriber->user->id) }}</small></p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('assets/crypto2/cartoon-7031973_640.webp') }}" class="card-img" alt="...">
            </div>
            <div class="card p-3 text-right">
                <blockquote class="blockquote mb-0">
                    <p>Current Balance: $ {{ number_format(UserWallet::currentBalance($subscriber->user->id)) }}</p>
                    <footer class="blockquote-footer">
                        <small class="text-muted">
                            current balance <cite title="Source Title">bitcoin equivalent</cite>
                        </small>
                    </footer>
                </blockquote>
            </div>
            <div class="card">
                <h5 class="card-header">Mining</h5>
                <div class="card-body">
                    <div class="btn-group" role="group">
                        @for($i=1; $i <= $subscriber->plan->duration; $i++)
                            <form action="{{ route('update_user_wallet', $subscriber->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-warning mx-1" type="submit" onclick="return confirm('Are You Sure You Want To Proceed?')">
                                    Mine for {{ $subscriber->start_date->addDays($i)->toFormattedDateString() }}
                                </button>
                            </form>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
