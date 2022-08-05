<x-page>
    <div class="about-wrapper section-space--pb_120 section-space--pt_90 start-up-patterns-image-01">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card my-5">
                        <h6 class="card-header text-center">{{config('app.name')}} has some exciting packages to get you started</h6>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-sm-12 col-md-12">
                                    @if($plans->isNotEmpty())
                                        @foreach($plans as $plan)
                                            <div class="card my-2">
                                                <h5 class="card-header">{{ $plan->name }} Package</h5>
                                                <div class="card-body">
                                                    <p class="card-title">Duration: {{ $plan->duration }} @if($plan->duration == 1) day @else days @endif</p>
                                                    <p class="card-title">ROI: {{ $plan->roi }} %</p>
                                                    <p class="card-title">Minimum Investment: ${{ number_format($plan->minimum_investment,2) }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-page>
