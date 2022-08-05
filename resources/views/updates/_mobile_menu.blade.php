<div class="mobile-menu-overlay" id="mobile-menu-overlay">
    <div class="mobile-menu-overlay__inner">
        <div class="mobile-menu-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8">
                        <!-- logo -->
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('static/images/logo/logo.svg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-4">
                        <!-- mobile menu content -->
                        <div class="mobile-menu-content text-right">
                            <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay__body">
            <nav class="offcanvas-navigation">
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
