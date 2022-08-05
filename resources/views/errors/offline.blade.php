<x-page>
    @push('offline-script')
        <script>
            // if(window.navigator.onLine){
            //     window.location.replace('/')
            // }

        </script>
    @endpush
        <div class="error-wrapper section-space--ptb_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto text-center">
                        <div class="error-wrapper">
                            <h3 class="text-color-primary">OOPS!</h3>
                            <h5 class="font-weight--light">No Stable Internet Connection Detected</h5>
                            <p>Check Your Internet Connection and reload this page or click on the link below to go to the home page</p>
                            {{--                            <div class="error-link section-space--ptb_100">--}}
                            {{--                                <img src="{{ asset('static/Na_June_47.svg') }}" class="img-fluid" alt="Error Images">--}}
                            {{--                            </div>--}}
                            <a href="/" class="ht-btn ht-btn-sm home-bacck-button mt-5">Go to Home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-page>
