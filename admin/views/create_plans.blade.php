@extends('admin_layout')

@section('pageTitle','Create Plans |'. config('app.name'))
@section('header','Create a new plan')
@section('content')
    @include('sweetalert::alert')
    @include('partials._create_plan')
@endsection
