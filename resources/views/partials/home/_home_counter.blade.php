<section class="counter-section pt-100 pb-70">
    <div class="container mt-5">
        <div class="h3 text-muted">Top Cryptocurrency</div>
        <div id="starred" class="bg-white px-2 pt-1 mt-2">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <div class="d-flex mt-2 border-right">
                                <div class="box_crypto p-2 rounded">
                                    <span class="fas fa-star text-primary px-1"></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <div class="text-muted">Name</div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="https://www.freepnglogos.com/uploads/bitcoin-png/bitcoin-all-about-bitcoins-9.png"
                                             alt="" class="icons">
                                    </div>
                                    <b class="pl-2">Bitcoin</b>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <div class="text-muted">Market cap</div>
                                <div><b>${{ number_format($singleCrypto->marketCapUsd,0) }}</b></div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <div class="text-muted">Price</div>
                                <div><b>${{ number_format($singleCrypto->priceUsd,6) }}</b></div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center labels">
                                    <div class="text-muted">Volume</div>
                                    <div class="green-label mx-1 px-1 rounded">74</div>
                                </div>
                                <div><b> ${{ number_format($singleCrypto->volumeUsd24Hr,0) }}</b></div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center labels">
                                    <div class="text-muted">Change</div>
                                </div>
                                <div><b class="red">{{ number_format($singleCrypto->changePercent24Hr,0) }}%</b></div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center labels">
                                    <div class="text-muted">Supply</div>
                                </div>
                                <div><b class="green">{{ number_format($singleCrypto->supply,0) }}</b></div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-lg-flex align-items-lg-center py-4">
            <div class="h3 text-muted">Top Cryptocurrency Prices</div>
        </div>
        <div id="top">
            <div class="bg-white table-responsive">
                <table class="table">
                    <tbody>

                    @forelse($cryptocurrencies as $crypto)
                        <tr>
                            <td>
                                <div class="d-flex mt-2 border-right">
                                    <div class="box_crypto p-2 rounded">
                                        <span class="text-primary px-2 font-weight-bold">{{ $loop->index + 1 }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="text-muted">Name</div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p>{{ $crypto->symbol }}</p>
                                        </div>
                                        <b class="pl-2">{{ $crypto->name }}</b>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="text-muted">Market cap</div>
                                    <div><b>$ {{ number_format($crypto->marketCapUsd,0) }}</b></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="text-muted">Price</div>
                                    <div><b>$ {{ number_format($crypto->priceUsd,6) }}</b></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center labels">
                                        <div class="text-muted">Volume</div>
{{--                                        <div class="green-label mx-1 px-1 rounded">24</div>--}}
                                    </div>
                                    <div><b>$ {{ number_format($crypto->volumeUsd24Hr,0) }}</b></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center labels">
                                        <div class="text-muted">Change</div>
{{--                                        <div class="orange-label mx-1 px-1 rounded">20%</div>--}}
                                    </div>
                                    <div><b class="red">{{ number_format($crypto->changePercent24Hr,6) }}%</b></div>
                                </div>
                            </td>
                            <td>
{{--                                <div class="graph">--}}
{{--                                    <img src="https://freepngimg.com/thumb/stock_market/25650-5-stock-market-graph-up-transparent-background.png"--}}
{{--                                         alt="" id="ethereum">--}}
{{--                                </div>--}}
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center labels">
                                        <div class="text-muted">Supply</div>
                                    </div>
                                    <div><b class="green">{{ number_format($crypto->supply,0) }}</b></div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <h1>Seems something went wrong! Please reload the page</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@section('extra_css')
    <style>
        #starred{
            box-shadow: 3px 3px 10px #b5b5b5;
        }
        .table div.text-muted{
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            margin-top: 0.3rem;
        }
        .icons{
            object-fit: contain;
            width: 25px;
            height: 25px;
            border-radius: 50%;
        }
        .graph img{
            object-fit: contain;
            width: 40px;
            height: 50px;
            transform: scale(2) rotateY(45deg);
        }
        .graph .dot{
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 3px solid #fff;
            position: absolute;
            background-color: blue;
            box-shadow: 1px 1px 1px #a5a5a5;
            top: 25px;
        }
        .graph .dot:after{
            background-color: #fff;
            content: '$9,999.00';
            font-weight: 600;
            font-size: 0.7rem;
            position: absolute;
            top: -25px;
            left: -20px;
            box-shadow: 1px 1px 2px #a5a5a5;
            border-radius: 2px;
        }
        .font-weight-bold{
            font-size: 1.3rem;
        }
        #ethereum{
            transform: scale(2) rotateY(45deg) rotateX(180deg);
        }
        #ripple{
            transform: scale(2) rotateY(10deg) rotateX(20deg);
        }
        #eos{
            transform: scale(2) rotateY(50deg) rotateX(190deg);
        }



        /* utility classes */
        .table tr td{
            border: none;
        }
        .red{
            color: #ff2f2f;
            font-weight: 700;
        }
        .green{
            color: #1cbb1c;
            font-weight: 700;
        }
        .labels,.graph{
            position: relative;
        }
        .green-label{
            background-color: #00b300;
            color: #fff;
            font-weight: 600;
            font-size: 0.7rem;
        }
        .orange-label{
            background-color: #ffa500;
            color: #fff;
            font-weight: 600;
            font-size: 0.7rem;
        }
        .border-right{
            transform: scale(0.6);
            border-right: 1px solid black!important;
        }
        .box_crypto{
            transform: scale(1.5);
            background-color: #dbe2ff;
        }
        #top .table tbody tr{
            border-bottom: 1px solid #ddd;
        }
        #top .table tbody tr:last-child{
            border: none;
        }
        select{
            background-color: inherit;
            padding: 8px;
            border-radius: 5px;
            color: #444;
            border: 1px solid #444;
            outline-color: #00f;
        }
        .text-white{
            background-color: rgb(43, 159, 226);
            border-radius: 50%;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 3px;
        }
        a:hover{
            text-decoration: none;
        }
        a:hover .text-white{
            background-color: rgb(20, 92, 187);
        }

        /* Scrollbars */
        ::-webkit-scrollbar{
            width: 10px;
            height: 4px;
        }
        ::-webkit-scrollbar-thumb{
            background: linear-gradient(45deg,#999,#777);
            border-radius: 10px;

        }

        /* media Queries */
        @media(max-width:379px){
            .d-lg-flex .h3{
                font-size: 1.4rem;
            }
        }
        @media(max-width:352px){
            #plat{
                margin-top: 10px;
            }
        }
    </style>
@endsection
