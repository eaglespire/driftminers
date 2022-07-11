@extends('client_layout')
@section('title','Profile')

@push('scripts')
    <script>
        function toggleSubscribe() {
            return {
                showForm:false,
                showDepositForm:false,
                toggleShow: function (){
                    this.showForm = true;
                },
                cancel:function (){
                    this.showForm = false;
                },
                toggleDepositForm:function (){
                   this.showDepositForm = true;
                }
            }
        }
    </script>
@endpush

@push('css')
    <style>
        button.disabled{
            pointer-events: none;
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center" x-data="toggleSubscribe()">
        <div style="min-height: 100px; border: 2px solid #0B2154;background-color: #0B2154" class="card card-body"></div>
        <div class="col-lg-8">
            <div class="card card-body" style="background-color: #D4DAFF">
                <p class="text-center">Current Funds</p>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <p>Free Margin</p>
                        <p>20</p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <p>Free Margin</p>
                        <p>20</p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <p>Free Margin</p>
                        <p>20</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="" class="btn btn-outline-primary disabled">Withdraw Request</a>
                    <button @click="toggleDepositForm" class="btn btn-primary @if(!user_can_deposit()) disabled @endif">Make a Deposit</button>
                    <button @click="toggleShow" class="btn btn-outline-success @if(count($plans) == 0 || user_has_subscribed())  disabled @endif">Subscribe to a plan</button>
                    <button type="button" class="btn btn-primary @if(user_has_subscribed()) disabled @endif">Already Subscribed</button>
                </div>
                <div class="col-12 mt-3" x-show.transition.duration.3000ms="showForm">
                    <div class="card card-body ">
                        @include('partials._subscribe')
                    </div>
                </div>
{{--                <div class="col-12 mt-3" x-show.transition.duration.3000ms="showDepositForm">--}}
{{--                    <div class="card card-body ">--}}
{{--                        @include('partials.deposit-form')--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            @if(user_has_subscribed())
                <div class="row my-3">
                <div class="col">
                    <div class="card" style="background-color: #D4DAFF">
                        <p class="card-header">My Plans</p>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">{{__('S/N')}}</th>
                                        <th scope="col">{{__('Type')}}</th>
                                        <th scope="col">{{__('Bonus %')}}</th>
                                        <th scope="col">{{__('Duration')}}</th>
                                        <th scope="col">{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{ $subscription->id ?? '' }}</th>
                                        <td>{{ $subscription->plan->name ?? '' }}</td>
                                        <td>{{ $subscription->plan->roi ??  '' }}%</td>
                                        <td>{{ $subscription->plan->duration ?? '' }}</td>
                                        <td>
                                            <button class="btn btn-danger">
                                                Pending ( Please make a deposit now to activate your subscription)
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
