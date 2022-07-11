@extends('admin_layout')

@section('pageTitle','Dashboard |'. config('app.name'))
@section('header','Index')
@section('content')
    @include('partials._admin_home')
@endsection
