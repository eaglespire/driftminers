<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? '' }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
{{--    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    @stack('css')
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.0/dist/chart.min.js"></script>
    <!-- Theme style -->
{{--    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('static/css/override.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    @include('partials._search')
                </div>
            </li>
            @include('partials._admin_notifications')
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
{{--            <img src="{{asset('static/images/logo/logo-white.svg')}}" alt="{{config('app.name')}}" class="brand-image elevation-3">--}}
{{--            <span class="brand-text font-weight-bold text-center">{{config('app.name')}}</span>--}}
            <span class="ml-2 font-weight-bold">{{config('app.name')}}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->username}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @if(count(admin_menu_items()) != 0)
                        @foreach(admin_menu_items() as $menuItem)
                            <li class="nav-item">
                                <a href="{{$menuItem['link']}}" class="nav-link {{set_active_class($menuItem['link'])}}">
                                    <i class="{{$menuItem['icon']}}"></i>
                                    <p>
                                        {{$menuItem['title']}}
                                        <i class="{{$menuItem['icon_2']}}"></i>
                                    </p>
                                </a>
                                @if($menuItem['sub'])
                                    <ul class="nav nav-treeview">
                                        @foreach($menuItem['sub'] as $sub)
                                            <li class="nav-item">
                                                <a href="{{$sub['link']}}" class="nav-link {{set_active_class($sub['link'])}}">
                                                    <i class="{{$sub['icon']}}"></i>
                                                    <p>{{$sub['title']}}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

        <div class="sidebar-custom">
            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{route('logout')}}" class="btn btn-danger"><i class="fas fa-cogs text-white"></i> {{__('Logout')}}</a>
            <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
            <form action="{{route('logout')}}" class="d-none" id="logout-form" method="post">
                @csrf
            </form>
        </div>
        <!-- /.sidebar-custom -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    {{--    <div class="content-wrapper" style="background-image: url({{ asset('assets/crypto2/metaverse-7027706_1280.webp') }})">--}}
    <div class="content-wrapper bg-dark">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-white font-weight-bold">{{ $header ?? '' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item "><a class="text-white" href="{{route('admin_home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a class="text-white font-weight-bold" href="">{{ $header ?? '' }}</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('messages')
                {{ $slot }}
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Invest today,</b> earn tomorrow
        </div>
        <strong>Copyright &copy; {{get_copyright_date()}} <a href="https://driftminers.com">{{config('app.name')}}</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{--<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>--}}
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
{{--<script src="{{ asset('js/alpine.js') }}"></script>--}}
{{--<script>--}}
{{--    function resizeIframe(obj) {--}}
{{--        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';--}}
{{--    }--}}
{{--</script>--}}
@stack('scripts')

<!-- AdminLTE App -->
{{--<script src="{{asset('dist/js/adminlte.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
