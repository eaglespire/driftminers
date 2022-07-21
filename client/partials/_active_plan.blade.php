<div class="card" style="background: linear-gradient(90deg, #f20f10 0%, #ec600d 100%)">
    <img src="{{ asset('assets/bitcoin-3228194_640.webp') }}" class="card-img-top" alt="...">
    @isset(auth()->user()->subscription)
        <h5 class="card-header text-center">{{ UserSubscription::status() ? "Current(Active) Plan" : "Current(Inactive) Plan" }}</h5>
    @else
        <h5 class="card-header text-center text-white">
            {{__('No Subscription Found')}}
        </h5>
    @endisset

    <div class="card-body text-white text-center">
        <h6 class="card-text font-weight-bold">
            {{ UserSubscription::planName(auth()->id()) ?? "Not Yet Subscribed" }}
        </h6>
        @isset(auth()->user()->subscription)
        <small class="text-white">{{ UserSubscription::status() ? "Plan Is Active" : "Plan is Inactive (Awaiting Confirmation From Admin)"  }}</small>
        @else
         <small class="text-white">{{__('No Plan Found')}}</small>
        @endisset
        <p>Start Date: {{ UserSubscription::startDate() }}</p>
        <p>End Date : {{ UserSubscription::endDate()  }}</p>
    </div>
</div>
