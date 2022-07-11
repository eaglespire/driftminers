<!-- mobile menu -->
<div class="mobile-nav">
    <a href="/" class="logo">
        <img src="{{ asset('assets/logo-157.png') }}" alt="logo">
    </a>
</div>
<!-- desktop menu -->
<div class="main-nav main-nav-2">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/logo-157.png')}}" alt="logo" class="w-100">
            </a>
            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{route('landing')}}" class="nav-link @if(route('landing') == url()->current()) active @endif">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about')}}" class="nav-link @if(route('about') == url()->current()) active @endif" >About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('faq')}}" class="nav-link @if(route('faq') == url()->current()) active @endif">FAQ's</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('terms')}}" class="nav-link @if(route('terms') == url()->current()) active @endif ">Terms & Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('privacy')}}" class="nav-link @if(route('privacy') == url()->current()) active @endif">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link @if(route('contact') == url()->current()) active @endif">Contact Us</a>
                    </li>
                    <li class="nav-item d-block  d-lg-none d-xl-none">
                        @guest
                            <a style="background-color: #1862EC;color:#ffffff;" href="{{route('login')}}" class="nav-link @if(route('login') == url()->current()) active @endif">Open Account or Login</a>
                        @else
                            <a style="background-color: #1862EC;color:#ffffff;" href="{{ role_checker() }}" class="nav-link @if(role_checker() == url()->current()) active @endif">Account Profile</a>
                              @include('partials._logout')
                        @endguest
                    </li>
                </ul>
            </div>
            <!-- navbar option -->
            <div class="navbar-option">
                @auth
                    <div class="navbar-option-item dropdown">
                    <button class="language-option" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" form="">
                        <img src="{{asset('assets/images/user.svg')}}" alt="account">
                       Account
                        <i class='bx bx-chevron-down'></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ role_checker() }}">
                            <img src="{{asset('assets/images/user_blue.svg')}}" alt="account">
                            Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <img src="{{asset('assets/images/poweroff.svg')}}" alt="account">
                            Logout
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" class="d-none" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                    <div class="navbar-option-item">
                    <a href="{{route('login')}}" class="btn1 btn-with-image">
                        <i class="flaticon-login"></i>
                        <i class="flaticon-login"></i>
                        Sign Up / Login
                    </a>
                </div>
                @endauth
            </div>
        </nav>
    </div>
</div>
