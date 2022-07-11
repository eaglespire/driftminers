@extends('client_layout')
@section('title','Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-12">
            @include('partials._wallet')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="card-columns">
                @include('partials._welcome')
                @include('partials._active_plan')
                @include('partials._all_plans')
                @include('partials._subscribe')
                @include('partials._transaction_history')
            </div>
        </div>
    </div>
@endsection
