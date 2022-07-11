@extends('master')
@section('content')
    <div class="row justify-content-center">
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
                <div class="col">
                    <a href="" class="btn btn-outline-danger">Withdraw</a>
                    <a href="" class="btn btn-outline-danger">New Deposit</a>
                    <a href="" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <div class="card" style="background-color: #D4DAFF">
                        <p class="card-header">My Plans</p>
                        <div class="card-body">
                            <table class="table">
                                <thead class="bg-primary">
                                <tr>
                                    <th scope="col">{{__('S/N')}}</th>
                                    <th scope="col">{{__('Type')}}</th>
                                    <th scope="col">{{__('Bonus %')}}</th>
                                    <th scope="col">{{__('Expiry')}}</th>
                                    <th scope="col">{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Gold</td>
                                    <td>20%</td>
                                    <td>{{now()}}</td>
                                    <td>
                                        <form action="" class="form-inline" method="post">
                                            <button class="btn btn-danger">
                                                cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
