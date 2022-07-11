@extends('admin_layout')

@section('pageTitle','Edit Plan |'. config('app.name'))
@section('header','Edit this plan')
@section('content')
    @include('partials._edit_plan')
@endsection
