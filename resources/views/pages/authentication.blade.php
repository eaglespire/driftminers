@extends('layouts.auth')

@section('partials')
    @include('partials._auth', ['title'=>'Login Or Open Account'])
@endsection

@section('auth_register')
    <div class="authentication-tab-item"  data-authentcation-tab="2">
        <img src="/assets/images/register.png" alt="icon">
        Register
    </div>
@endsection

@section('auth_content')
    <div class="authentication-tab-details">
        <div class="authentication-tab-details-item authentication-tab-details-active" data-authentcation-details="1">
            @include('partials._login')
        </div>
        <div class="authentication-tab-details-item"  data-authentcation-details="2">
            @include('partials._register')
        </div>
    </div>
@endsection
