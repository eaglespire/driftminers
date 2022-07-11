
<section class="home-about-section-2 bg-off-white pt-100 pb-70 overflow-hidden">
    <div class="container-fluid p-0">
        <div class="home-about-content">
            <!-- enterprise -->
            <div class="row align-items-center m-0">
                <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                    <div class="home-facility-overview desk-ml-auto pr-20 pl-20 pb-30">
                        <h3 class="home-about-title">
                            {{__('A fully integrated suite for large earnings')}}
                        </h3>
                        <p class="home-about-para">
                         {{ config('app.name') }}   {{__(' is affiliated with the blockchain technology to provide the best
mining services at precisely all level of investments, a tool to build income and hit financial goals.')}}
                        </p>
                        <div class="home-about-list" x-data="buildList()">
                            <template x-for="item in items">
                                <div class="home-about-list-item">
                                    <img src="/assets/images/check.png" alt="checl">
                                    <span x-text="item.title"></span>
                                </div>
                            </template>
                        </div>
                        <div class="home-about-animation">
                            <div class="home-animation-item">
                                <img src="/assets/images/curve-line.png" alt="animated-icon">
                            </div>
                            <div class="home-animation-item">
                                <img src="/assets/images/triangle.png" alt="animated-icon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                    <div class="home-facility-item img-right-res pb-30">
                        <img src="/assets/images/home-enterprise-2.png" alt="facility">
                    </div>
                </div>
            </div>
            <div class="section-mtb-40"></div>
            <!-- business -->
            <div class="row align-items-center m-0">
                <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                    <div class="home-facility-item img-left-res pb-30">
                        <img src="/assets/crypto/crypto2.webp" alt="facility">

                        <div class="home-about-animated-img home-animated-img-right">
                            <img src="/assets/crypto/CrYPTO-275.png" alt="why-us">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                    <div class="home-facility-overview desk-mr-auto pr-20 pl-20 pb-30">
                        <h3 class="home-about-title">
                            {{__('Fastest Mining Rig')}}
                        </h3>
                        <p class="home-about-para">
                           {{__(' By 2018, it had become the world\'s largest designer of
 application-specific integrated circuit (ASIC) chips for bitcoin mining. The company also
 operates BTCom and Antpool, historically two of the largest mining pools for bitcoin in an effort to boost Bitcoin Cash
 (BCH) prices. Antpool "burned" 12% of the BCH they mined by sending them to irrecoverable addresses
 .Bitmain was reportedly profitable in early 2018, with a net profit of $ 742.7 million in the first half of 2018,
 and negative operating cash flow.')}}
                        </p>
                        <div class="home-about-list" x-data="buildList()">
                            <template x-for="item in items_2">
                                <div class="home-about-list-item">
                                    <img src="/assets/images/check.png" alt="checl">
                                    <span x-text="item.title"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-mtb-40"></div>
            <!-- entrepreneur -->
            <div class="row align-items-center m-0">
                <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                    <div class="home-facility-overview desk-ml-auto pr-20 pl-20 pb-30">
                        <h3 class="home-about-title">
                            {{__('Supported Cryptocurrencies')}}
                        </h3>
                        <p class="home-about-para">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod cste et dolore magnam aliquam quaerat voluptatem.</p>
                        <div class="home-about-list" x-data="buildList()">
                            <template x-for="item in cryptocurrencies">
                                <div class="home-about-list-item">
                                    <img src="/assets/images/check.png" alt="checl">
                                    <span x-text="item.title"></span>
                                </div>
                            </template>
                        </div>
                        <div class="home-about-animation entrepreneur-animation">
                            <div class="home-animation-item">
                                <img src="/assets/images/curve-line.png" alt="animated-icon">
                            </div>
                            <div class="home-animation-item">
                                <img src="/assets/images/triangle.png" alt="animated-icon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                    <div class="home-facility-item img-right-res pb-30">
                        <img src="/assets/images/home-entreprenour-2.png" alt="facility">
                        <div class="home-about-animated-img home-animated-table-img home-animated-img-left">
                            <img src="/assets/images/data-table.png" alt="data-table">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
