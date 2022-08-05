<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('static/images/logo/logo.svg') }}">
        <link rel="stylesheet" href="{{ asset('static/css/vendor/vendor.min.css') }}">
        <link rel="stylesheet" href="{{ asset('static/css/plugins/plugins.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('static/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/override.css') }}">
    @stack('offline-script')
</head>

<body>


<div class="preloader-activate preloader-active open_tm_preloader">
    <div class="preloader-area-wrap">
        <div class="spinner d-flex justify-content-center align-items-center h-100">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>
<!--====================  header area ====================-->
<div class="header-area header-area--default">
    <!-- Header Top Wrap Start -->
        @include('updates._top_header')
    <!-- Header Top Wrap End -->

    <!-- Header Bottom Wrap Start -->
        @include('updates._bottom_header')
    <!-- Header Bottom Wrap End -->
</div>
<!--====================  End of header area  ====================-->
<div class="site-wrapper-reveal overflow-hiden">
    {{ $slot }}
</div>

<!--====================  footer area ====================-->
<div class="footer-area-wrapper ">
    <div class="footer-area section-space--ptb_120 bg-img footer-bg--overlay" data-bg="static/images/bg/footer-bg-01.jpg">
        <div class="container">
            <div class="row footer-widget-wrapper">
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget">
                    <div class="footer-widget__logo mb-30">
                        <img src="/static/images/logo/logo-white.svg" class="img-fluid" alt="">
                    </div>
                    <div class="footer-widget-dic">

                        <p class="footer-dec">
                            "Mining" is a metaphor for the computational work that nodes in the network undertake in hopes of earning new tokens.
                            In reality, miners are essentially getting paid for their work as auditors.
                        </p>

                        <div class="newsletter-footer-wrap mt-20">
                            <h5 class="mb-10">Subscribe Newsletter</h5>
                            <p>Subscribe our newsletter and get latest update
                                about our offers, promotions and adds</p>
                            <div class="newsletter-footer mt-20">
                                <form action="#" class="widget-newsletter-form">
                                    <input type="text" placeholder="Enter your email">
                                    <div class="subscribe-button">
                                        <button class="subscribe-btn">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <ul class="list ht-social-networks mt-30">

                            <li class="item">
                                <a href="https://facebook.com" target="_blank">
                                    <i class="fa fa-facebook-f link-icon"></i>
                                </a>
                            </li>
                            <li class="item">
                                <a href="https://twitter.com" target="_blank">
                                    <i class="fa fa-twitter link-icon"></i>
                                </a>
                            </li>
                            <li class="item">
                                <a href="https://instagram.com" target="_blank">
                                    <i class="fa fa-instagram link-icon"></i>
                                </a>
                            </li>
                            <li class="item">
                                <a href="https://linkedin.com" target="_blank">
                                    <i class="fa fa-linkedin link-icon"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="coustom-row-in-footer">
                        <div class="footer-widget-coustom-col footer-widget">
                            <h4 class="footer-widget__title mb-20 text-white">Useful Links</h4>
                            <ul class="footer-widget__item-list">
                                <li><a href="{{ route('about') }}" class="hover-style-link">About us</a></li>
                                <li><a href="{{ route('privacy') }}" class="hover-style-link">Privacy Policy</a></li>
                                <li><a href="{{ route('contact') }}" class="hover-style-link">Contact us</a></li>
                            </ul>
                            <ul class="footer-widget__item-list">
                                <li><a href="{{ route('contact') }}" class="hover-style-link">Online Support</a></li>
                                <li><a href="#" class="hover-style-link">Our Plans</a></li>
                                <li><a href="{{ route('terms') }}" class="hover-style-link">Conditions</a></li>
                            </ul>
                        </div>
                        <div class="footer-widget-coustom-col footer-widget">
                            <h4 class="footer-widget__title mb-20 text-white">Contact Info</h4>
                            <div class="footer-widget__list">
                                <div class="single-footer-widger">
                                    <h5>Address</h5>
                                    <p>456 Labisto Parkways, CA, United States</p>
                                </div>
                                <div class="single-footer-widger">
                                    <h5>Phone</h5>
                                    <p>01254 879 658, 65987 456 987 <br> 01256 879 857, 01458 658 985</p>
                                </div>
                                <div class="single-footer-widger">
                                    <h5>Web</h5>
                                    <p>
                                        <a href="#">support@drfitminers.com</a> <br>
                                        <a href="#">www.driftminers.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-sm-6 footer-widget">

                </div>-->
            </div>
        </div>
    </div>
    <div class="footer-copyright-area mt-25 mb-25">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <span class="copyright-text">Copyright &copy; 2019-2022<a href="https://driftminers.com/" target="_blank" >All Rights Reserved.</a> driftminers.com</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of footer area  ====================-->

<!--====================  scroll top ====================-->
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fa fa-angle-double-up"></i>
    <i class="arrow-bottom fa fa-angle-double-up"></i>
</a>
<!--====================  End of scroll top  ====================-->
<!--====================  mobile menu overlay ====================-->
@include('updates._mobile_menu')
<!--====================  End of mobile menu overlay  ====================-->













<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="/static/js/vendor/modernizr-2.8.3.min.js"></script>

<!-- jQuery JS -->
<script src="/static/js/vendor/jquery-3.3.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="/static/js/vendor/bootstrap.min.js"></script>


<!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->


<script src="/static/js/plugins/plugins.min.js"></script>


<!-- Main JS -->
<script src="/static/js/main.js"></script>


</body>

</html>
