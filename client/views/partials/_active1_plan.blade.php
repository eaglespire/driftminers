@isset($subscription)
<div class="card" style="background: linear-gradient(90deg, #f20f10 0%, #ec600d 100%)">
    <img src="{{ asset('assets/bitcoin-3228194_640.webp') }}" class="card-img-top" alt="...">
    <h5 class="card-header text-center">{{ $subscription->confirm_subscription ? "Current(Active) Plan" : "Current(Inactive) Plan" }}</h5>
    <div class="card-body text-white text-center">
        <h6 class="card-text font-weight-bold">
            {{ $subscription->plan->name ?? "Not Yet Subscribed" }}
        </h6>
        <small class="text-white">{{ !$subscription->confirm_subscription ?? "Awaiting approval"  }}</small>
        @isset($subscription->start_date)
            <p>Start Date: {{ $subscription->start_date->toFormattedDateString() }}</p>
        @else
            <p>Start Date: NA</p>
        @endisset
        @isset($subscription->end_date)
        <p>End Date : {{ $subscription->end_date->toFormattedDateString()  }}</p>
        @else
            <p>End Date: NA</p>
        @endisset
    </div>
</div>
@else
    <div class="card" style="background: linear-gradient(90deg, #f20f10 0%, #ec600d 100%)">
        <img src="{{ asset('assets/bitcoin-3228194_640.webp') }}" class="card-img-top" alt="...">
        <h5 class="card-header text-center">No Subscription Found</h5>
        <div class="card-body text-white text-center">
            <h6 class="card-text font-weight-bold">
                No active subscription
            </h6>
            <small class="text-white"></small>
            <p>Start Date: NA</p>
            <p>End Date : NA</p>
        </div>
    </div>

@endisset
