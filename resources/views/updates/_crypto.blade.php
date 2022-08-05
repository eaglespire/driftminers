@if( isset($cryptocurrencies) && count($cryptocurrencies) != 0 )
    <div class="business-solutions-area section-space--pb_120 start-up-patterns-image-02">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-left mb-20">
                        <h6 class="section-sub-title">Cryptocurrency Market</h6>
                        <h3 class="section-title">Top Cryptocurrencies</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid cou-container-device">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="row col-06__left float-lg-right ">
                        <!-- service-area Start -->
                        @foreach($cryptocurrencies as $crypto)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="ht-service-box style-solutions">
                                    <div class="service-content">
                                        <h4 class="section-title mb-10"></h4>
                                        <div class="card">
                                            <div class="card-header bg-primary ">
                                                <h6 class="text-white">
                                                    {{ $crypto->name }}
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <p>Cap: <small class="text-muted">${{ number_format($crypto->marketCapUsd) }}</small></p>
                                                <p>Price : <small class="text-muted">${{ number_format($crypto->priceUsd,3) }}</small></p>
                                                <p>Volume: <small class="text-muted">$ {{ number_format($crypto->volumeUsd24Hr) }}</small></p>
                                                <p>Change: <small class="text-muted"> {{ number_format($crypto->changePercent24Hr) }}</small></p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- service-area End -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="features-images tablet-mt__40 small-mt__40" data-aos="fade-left">
                        <img class="img-fluid" src="{{ asset('assets/updates/facility-img-4.png') }}" alt="Start up image">
                    </div>
                    <div class="features-images tablet-mt__40 small-mt__40 mt-5" data-aos="fade-right">
                        <img class="img-fluid" src="{{ asset('assets/updates/facility-img-5.png') }}" alt="Start up image">
                    </div>
                </div>
            </div>

        </div>

    </div>
@else
    <div class="business-solutions-area section-space--pb_120 start-up-patterns-image-02">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-left mb-20">
                        <h6 class="section-sub-title">Cryptocurrencies market</h6>
                        <h3 class="section-title">No Internet!<br> Connect to Fetch Latest Cryptocurrency data</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
