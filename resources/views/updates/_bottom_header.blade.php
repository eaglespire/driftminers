<div class="header-bottom-wrap header-area--absolute  header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header default-menu-style position-relative">
                    <!-- brand logo -->
                    <div class="header__logo">
                        <a href="/">
                            <img src="{{ asset('static/images/logo/logo.svg') }}" class="img-fluid" alt="">
                        </a>
                    </div>

                    <!-- header midle box  -->
                    <div class="header-midle-box">
                        <div class="header-bottom-wrap d-md-block d-none">
                            <div class="header-bottom-inner">
                                <div class="header-bottom-left-wrap">
                                    <!-- navigation menu -->
                                    <div class="header__navigation d-none d-lg-block">
                                        <nav class="navigation-menu primary--menu">
                                            <ul>
                                                <li class="has-children">
                                                    <a href="{{ route('landing') }}"><span>Home</span></a>
                                                </li>
                                                <li class="has-children">
                                                    <a href="{{ route('about') }}"><span>About</span></a>
                                                </li>
                                                <li class="has-children">
                                                    <a href="{{ route('plans') }}"><span>Our Plans</span></a>
                                                </li>
                                                <li class="has-children">
                                                    <a href="{{ route('faq') }}"><span>FAQ</span></a>
                                                </li>
                                                <li class="has-children">
                                                    <a href="{{ route('privacy') }}"><span>Privacy Policy</span></a>
                                                </li>
                                                <li class="has-children">
                                                    <a href="{{ route('terms') }}"><span>Terms & Condition</span></a>
                                                </li>
                                                <li class="has-children">
                                                    <a href="{{ route('contact') }}"><span>Contact</span></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="mobile-navigation-icon d-block d-lg-none" id="mobile-menu-trigger">
                        <i></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
