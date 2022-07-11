@include('includes.head')
<body class=""> <!-- Use overflow-x-hidden class if you use same slider as client section slider -->
<!-- preloader -->
@include('includes.preloader')
<!-- .end preloader -->
<!-- navbar -->
<div class="fixed-top">
    <div class="navbar-area">
        @include('includes.navbar')
    </div>
</div>
<!--end navbar-->
<!-- partials start-->
@yield('partials')
<!-- partials end  -->
@yield('content')
<!-- footer -->
<footer class="footer-bg">
    @include('includes.footer')
</footer>
<!-- .end footer -->

<!-- essential js -->
<script src="/assets/js/jquery-3.5.1.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!-- magnific popup js -->
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<!-- owl carousel js -->
<script src="/assets/js/owl.carousel.min.js"></script>
<!-- form ajazchimp js -->
<script src="/assets/js/jquery.ajaxchimp.min.js"></script>
<!-- form validator js  -->
<script src="/assets/js/form-validator.min.js"></script>
<!-- contact form js -->
<script src="/assets/js/contact-form-script.js"></script>
<!-- meanmenu js -->
<script src="/assets/js/jquery.meanmenu.min.js"></script>
<!-- waypoints js -->
<script src="/assets/js/jquery.waypoints.js"></script>
<!-- counter js -->
<script src="/assets/js/counter-up.js"></script>
<!-- main js -->
<script src="/assets/js/script.js"></script>
<script src="{{asset('js/alpine.js')}}"></script>

@stack('scripts')
</body>
</html>
