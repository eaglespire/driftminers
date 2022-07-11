@extends('layouts.app')

@section('title',config('app.name'))

@section('partials')
    @include('partials._landing')
@endsection

@section('content')
    <!-- home-about-section-2 -->
    @include('partials.home._home_about')
    <!-- .end home-about-section -->
    <!-- counter-section -->
    @include('partials.home._home_counter')
    <!-- .end counter-section -->
    <!-- home-facility-section -->
    @include('partials.home._home_facility')
    <!-- .end home-facility-section -->
    <!-- home-quick-contact-section -->
    @include('partials.home._home_contact')
    <!-- .end home-quick-contact-section -->
    <!-- home-client-section -->
    @include('partials.home._home_testimonials')
    <!-- .end home-client-section -->

    <!-- home-contact-section -->
    @include('partials.home.home_call_to_action')
    <!-- .end home-contact-section -->
@endsection

@section('css')
    h2.carousel_h2 {
    color: #000;
    font-size: 26px;
    font-weight: 300;
    position: relative;
    margin: 0 0 50px 0;
    text-transform: uppercase;
    display: inline-block;
    }
    h2.carousel_h2::after {
    content: "";
    width: 50%;
    position: absolute;
    height: 4px;
    border-radius: 1px;
    background: #0B2154;
    left: 0;
    bottom: -20px;
    }
       .carousel {
           margin: 50px auto;
       }
       .carousel .carousel-item {
           color: #0B2154;
           overflow: hidden;
           min-height: 120px;
           font-size: 13px;
       }
       .carousel .media {
           position: relative;
           padding: 0 0 0 20px;
           margin-left: 20px;
       }
       .carousel .media img {
           width: 75px;
           height: 75px;
           display: block;
           border-radius: 50%;
           box-shadow: 0 2px 4px rgba(0,0,0,0.2);
           border: 2px solid #fff;
       }
       .carousel .testimonial {
           color: #fff;
           position: relative;
           background: #0B2154;
           padding: 15px;
           margin: 0 0 20px 20px;
       }
       .carousel .testimonial::before, .carousel .testimonial::after {
           content: "";
           display: inline-block;
           position: absolute;
           left: 0;
           bottom: -20px;
       }
       .carousel .testimonial::before {
           width: 20px;
           height: 20px;
           background: #0B2154;
           box-shadow: inset 12px 0 13px rgba(0,0,0,0.5);
       }
       .carousel .testimonial::after {
           width: 0;
           height: 0;
           border: 10px solid transparent;
           border-bottom-color: #fff;
           border-left-color: #fff;
       }
       .carousel .carousel-item .row > div:first-child .testimonial {
           margin: 0 20px 20px 0;
       }
       .carousel .carousel-item .row > div:first-child .media {
           margin-left: 0;
       }
       .carousel .testimonial p {
           text-indent: 40px;
           line-height: 21px;
           margin: 0;
       }
       .carousel .testimonial p::before {
           content: "\201D";
           font-family: Arial,sans-serif;
           color: #fff;
           font-weight: bold;
           font-size: 68px;
           line-height: 70px;
           position: absolute;
           left: -25px;
           top: 0;
       }
       .carousel .overview {
           padding: 3px 0 0 15px;
       }
       .carousel .overview .details {
           padding: 5px 0 8px;
       }
       .carousel .overview b {
           text-transform: uppercase;
           color: #EE500E;
       }
       .carousel-control-prev, .carousel-control-next {
           width: 30px;
           height: 30px;
           background: #EE500E;
           text-shadow: none;
           top: 4px;
            color:#fff
       }
       .carousel-control-prev i, .carousel-control-next i {
           font-size: 16px;
       }
       .carousel-control-prev {
           left: auto;
           right: 40px;
       }
       .carousel-control-next {
           left: auto;
       }
       .carousel-indicators {
           bottom: -80px;
       }
       .carousel-indicators li, .carousel-indicators li.active {
           width: 17px;
           height: 17px;
           border-radius: 0;
           margin: 1px 5px;
           box-sizing: border-box;
       }
       .carousel-indicators li {
           background: #e2e2e2;
           border: 4px solid #fff;
       }
       .carousel-indicators li.active {
           color: #fff;
           background: #ff5555;
           border: 5px double;
       }
       .star-rating li {
           padding: 0 2px;
       }
       .star-rating i {
           font-size: 14px;
           color: #ffdc12;
       }
@endsection

@section('scripts')
    <script>
        function buildList() {
            return {
                items:[
                    { id:1, title:'Fast Payout' },
                    { id:2, title:'Flexible Investment Levels' },
                    { id:3, title:'Non Stop Mining Activities' },
                    { id:4, title:'Expert Miners on Duty 24/7' },
                    { id:5, title:'Consultancy Services' },
                ],
                cryptocurrencies:[
                    { id:1, title:'BITCOIN' },
                    { id:2, title:'ETHEREUM' },
                    { id:3, title:'USDT' },
                    { id:4, title:'DOGECOIN' },
                ],
                items_2: [
                    { id:1, title:'Hash Rate: 504 MH/s' },
                    { id:2, title:'Chip Type: BM1485 ASIC chip' },
                    { id:3, title:'DC Voltage Input: 11.60 ~ 13.00 V' },
                    { id:4, title:'Dimensions: 352mm(l) x 130mm(w) x 187.5mm(h)' },
                    { id:5, title:'Chip quantity per unit: 288 chips on four hashing boards, 72 chips on one hashing board' },
                    { id:6, title:'Power Efficiency: 1.6J/MH + 10% (at the wall, with Bitmain\'s APW3 PSU 93% efficiency, 25 degree celsius ambient temperature'  },
                ]
            }
        }
    </script>
@endsection




