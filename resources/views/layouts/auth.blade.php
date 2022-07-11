@extends('layouts.app')

@section('content')
    <div class="authentication-section">
        <div class="authentication-grid">
            <div class="authentication-item authentication-img-bg"></div>
            <div class="authentication-item bg-white pl-15 pr-15">
                <div class="authentication-user-panel">
                    <div class="authentication-user-header">
                        <a href="/"><img src="{{asset('assets/crypto/bitcoin-4851381.svg')}}" alt="{{config('app.name')}} logo"></a>
                        <h1>Welcome to {{config('app.name')}}</h1>
                    </div>
                    <div class="authentication-user-body">
                        <div class="authentication-tab">
                            <div class="authentication-tab-item authentication-tab-active"  data-authentcation-tab="1">
                                <img src="/assets/images/login.png" alt="icon">
                                Login
                            </div>
                            @yield('auth_register')
                        </div>
                        @yield('auth_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
