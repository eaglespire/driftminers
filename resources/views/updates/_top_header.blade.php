<div class="header-top-wrap theme-bg-three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 col-9">
                <p class="text-md-left top-message">Contact us: <a href="tel:132432432"> (+880) 01258 987 254</a></p>
            </div>
            <div class="col-md-4 col-6  d-md-block d-none">
                <p class="top-message text-md-center"><a href="mailto:support@driftminers.com">support@driftminers.com</a> </p>
            </div>
            <div class="col-md-4 col-3">
                <!-- header right box -->
                <div class="header-right-box">
                    <div class="header-right-inner" id="hidden-icon-wrapper">
                        @guest
                        <p class="mobile-top-message d-block d-md-none"><a href="{{ route('login') }}">Login</a> </p>
                        <p class="mobile-top-message d-block d-md-none"><a href="{{ route('register') }}">Register</a> </p>
                        @else
                            <p class="mobile-top-message d-block d-md-none"><a href="{{ role_checker() }}">Dashboard</a> </p>
                        @endguest
                        <!-- register -->
                        <!-- language-menu -->
                        <div class="language-menu d-md-block d-none">
                            <ul>
                                @guest
                                <li>
                                    <a href="{{ route('login') }}" class="">
                                        Login |
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" class="">
                                        Register
                                    </a>
                                </li>
                                @else
                                    <li>
                                        <a href="{{ role_checker() }}" class="">
                                            Dashboard
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                    <!-- hidden icons menu -->
                    <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                        <a href="javascript:void(0)">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
