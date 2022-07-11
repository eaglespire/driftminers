@extends('admin_layout')

@section('pageTitle','Subscriber |'. config('app.name'))
@section('header','View '. $subscriber->user->name)
@section('content')
    @include('partials._subscriber')
@endsection
