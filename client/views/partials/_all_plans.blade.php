@push('scripts')
    <script>
        function buildPlans() {
            return {
                showPlans: false,
                toggleShowPlans: function (){
                    this.showPlans = !this.showPlans
                }
            }
        }
    </script>
@endpush

@if($plans->count() != 0)
    <div class="card" style="background-color: #289DDA" x-data="buildPlans()">
    <img src="{{ asset('assets/money-5496527_640.webp') }}" class="card-img-top" alt="...">
    <h5 class="card-header text-center">{{ __('Available Plans') }}</h5>
    <div class="card-body">
        <ul class="list-group list-group-flush" x-show.transition.duration.3000ms="showPlans">
            @foreach($plans as $plan)
                <li class="list-group-item list-group-item-primary">{{ $plan->name }}</li>
            @endforeach
        </ul>
        <button @click="toggleShowPlans" class="btn btn-primary btn-block mt-1">Toggle Show Plans</button>
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
