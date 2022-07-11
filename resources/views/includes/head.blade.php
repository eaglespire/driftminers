<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden"> <!-- Use overflow-x-hidden class if you use same slider as client section slider -->

<head>
    <meta charset="utf-8">
    <meta name="description" content="Cryptocurrency investment, Bitcoin, Ethereum investment">
    <meta name="keywords" content="Cryptocurrency investment, Bitcoin, Ethereum investment">
    <meta name="author" content="Cryptocurrency investment, Bitcoin, Ethereum investment">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" href="/assets/images/tab.png" type="image/png" sizes="16x16">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- animate css -->
    <link rel="stylesheet" href="/assets/css/animate.min.css" type="text/css" media="all" />
    <!-- owl carousel css -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css" type="text/css" media="all" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="/assets/css/meanmenu.min.css" type="text/css" media="all" />
    <!-- magnific popup css -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.min.css" type="text/css" media="all" />
    <!-- boxicons css -->
    <link rel='stylesheet' href='/assets/css/boxicons.min.css' type="text/css" media="all" />
    <!-- Line Awesome CSS -->
    <link rel='stylesheet' href='/assets/css/line-awesome.min.css' type="text/css" media="all" />
    <!-- flaticon css -->
    <link rel='stylesheet' href='/assets/css/flaticon.css' type="text/css" media="all" />
    <!-- style css -->
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all" />
    <!-- responsive css -->
    <link rel="stylesheet" href="/assets/css/responsive.css" type="text/css" media="all" />
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @stack('css')
</head>
