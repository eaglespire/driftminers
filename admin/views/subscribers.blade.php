@extends('admin_layout')

@section('pageTitle','All Subscribers |'. config('app.name'))
@section('header','All Subscribers')
@section('content')
    @include('partials._subscribers')
@endsection
