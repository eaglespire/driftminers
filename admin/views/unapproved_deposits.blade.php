@extends('admin_layout')

@section('pageTitle','Unapproved Deposits |'. config('app.name'))
@section('header','Unapproved Deposits')
@section('content')
    @include('partials._unapproved_deposits')
@endsection
