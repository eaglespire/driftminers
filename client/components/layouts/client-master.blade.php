{{--{{ dd(auth()->user()->unreadNotifications) }}--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">--}}
    <!-- Theme style -->
{{--    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--    <link rel="stylesheet" href="{{asset('css/custom.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('static/css/override.css') }}">
    <style>
        @media (min-width: 576px) {
            .card-columns {
                column-count: 2;
            }
        }
        @media (min-width: 768px) {
            .card-columns {
                column-count: 2;
            }
        }
        @media (min-width: 992px) {
            .card-columns {
                column-count: 3;
            }
        }
        @media (min-width: 1200px) {
            .card-columns {
                column-count: 3;
            }
        }
    </style>
    @stack('css')
</head>
<body class="hold-transition layout-top-nav">
{{--@include('sweetalert::alert')--}}
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-lg navbar-light navbar-white">
        <div class="container">
            <a href="/" class="navbar-brand">
{{--                <img src="{{ asset('static/images/logo/logo.svg') }}" alt="{{config('app.name')}} logo" class="brand-image elevation-3" style="opacity: .8">--}}
                <span class="brand-text font-weight-light">{{config('app.name')}}</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('landing')}}" class="nav-link @if(route('landing') == url()->current()) active @endif">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('client.welcome')}}" class="nav-link @if(route('client.welcome') == url()->current()) active @endif">Dashboard</a>
                    </li>
                </ul>

            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- Messages Dropdown Menu -->
                @if(count(auth()->user()->unreadNotifications) != 0)
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-envelope mr-2"></i>
                        <span class="badge badge-danger navbar-badge">{{ count(auth()->user()->unreadNotifications) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="/assets/man-157699_640.webp" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            New Message
                                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">{{ $notification->data['message'] }}</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                        <a href="{{ route('mark-as-read') }}" class="dropdown-item dropdown-footer">Mark as Read</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('client.welcome') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        <a class="dropdown-item" href="{{ route('client.profile') }}">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <a class="dropdown-item" href="{{ route('client.transactions') }}">
                            <i class="fas fa-history"></i> Transaction history
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" class="d-none" method="post">
                            @csrf
                        </form>
                    </div>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content ">
            <div class="container ">
                {{ $slot }}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Invest now and smile later
        </div>
        <strong>Copyright &copy; {{get_copyright_date()}} <a href="https://driftminers.com">DriftMiners</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{--<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>--}}
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
{{--<script src="{{asset('dist/js/adminlte.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--<script src="{{asset('js/alpine.js')}}"></script>--}}
@stack('scripts')
</body>
</html>
