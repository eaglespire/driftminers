<x-layouts.client>
    @if(count(PlanServices::all()) != 0)
        <div class="card">
            <img src="{{ asset('assets/money-5496527_640.webp') }}" class="card-img-top" alt="...">
            <h5 class="card-header">Available Plans</h5>
            <div class="card-body">
                <p class="card-text">
                    List of Available Plans
                </p>
                <div class="list-group">
                    @if(PlanServices::all()->isNotEmpty())
                        @foreach(PlanServices::all() as $plan)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $plan->name }}</h5>
                                    <small>ROI : {{ $plan->roi }} %</small>
                                </div>
                                <small>Duration: {{ $plan->duration }} day(s)</small>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="card" style="background-color: #289DDA">
            <img src="{{ asset('assets/money-5496527_640.webp') }}" class="card-img-top" alt="...">
            <h5 class="card-header text-center">{{ __('Data not available') }}</h5>
            <div class="card-body">
                No data
            </div>
        </div>
    @endif
</x-layouts.client>
