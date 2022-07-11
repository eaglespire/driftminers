@extends('master')

@section('title','Available Plans')

@section('content')
    <div class="row my-2">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card" x-data="showFullDetail()">
                <div class="card-header bg-primary">
                    <h5 class="card-title font-weight-bold">Plan Name</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, culpa.</p>
                    <div x-show.transition.duration.2000ms="open">
                        <div class="card card-body" style="background-color: #D4DAFF">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dignissimos distinctio, eius incidunt itaque laboriosam
                                laudantium quae rerum veritatis voluptatibus.
                            </p>
                            <p class="card-text">Bonus % - 20%</p>
                            <p class="card-text">Duration - 3 days</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a @click="show" href="#" class="btn btn-outline-primary" x-show="knowMoreButton">Learn More</a>
                    <a href="#" class="btn btn-primary">Activate</a>
                    <a @click="hide" href="#" class="btn btn-outline-primary" x-show="closeButton">Show Less</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card" x-data="showFullDetail()">
                <div class="card-header bg-primary">
                    <h5 class="card-title font-weight-bold">Plan Name</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, culpa.</p>
                    <div x-show.transition.duration.2000ms="open">
                        <div class="card card-body" style="background-color: #D4DAFF">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dignissimos distinctio, eius incidunt itaque laboriosam
                                laudantium quae rerum veritatis voluptatibus.
                            </p>
                            <p class="card-text">Bonus % - 20%</p>
                            <p class="card-text">Duration - 3 days</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a @click="show" href="#" class="btn btn-danger" x-show="knowMoreButton">Learn More</a>
                    <a href="#" class="btn btn-danger">Activate</a>
                    <a @click="hide" href="#" class="btn btn-danger" x-show="closeButton">Show Less</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card" x-data="showFullDetail()">
                <div class="card-header bg-primary">
                    <h5 class="card-title font-weight-bold">Plan Name</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, culpa.</p>
                    <div x-show.transition.duration.2000ms="open">
                        <div class="card card-body" style="background-color: #D4DAFF">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dignissimos distinctio, eius incidunt itaque laboriosam
                                laudantium quae rerum veritatis voluptatibus.
                            </p>
                            <p class="card-text">Bonus % - 20%</p>
                            <p class="card-text">Duration - 3 days</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a @click="show" href="#" class="btn btn-danger" x-show="knowMoreButton">Learn More</a>
                    <a href="#" class="btn btn-danger">Activate</a>
                    <a @click="hide" href="#" class="btn btn-danger" x-show="closeButton">Show Less</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card" x-data="showFullDetail()">
                <div class="card-header bg-primary">
                    <h5 class="card-title font-weight-bold">Plan Name</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, culpa.</p>
                    <div x-show.transition.duration.2000ms="open">
                        <div class="card card-body" style="background-color: #D4DAFF">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dignissimos distinctio, eius incidunt itaque laboriosam
                                laudantium quae rerum veritatis voluptatibus.
                            </p>
                            <p class="card-text">Bonus % - 20%</p>
                            <p class="card-text">Duration - 3 days</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a @click="show" href="#" class="btn btn-danger" x-show="knowMoreButton">Learn More</a>
                    <a href="#" class="btn btn-danger">Activate</a>
                    <a @click="hide" href="#" class="btn btn-danger" x-show="closeButton">Show Less</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showFullDetail() {
            return {
                open:false,
                knowMoreButton: true,
                closeButton:false,
                show(){
                    this.open = true
                    this.knowMoreButton = false
                    this.closeButton = true
                },
                hide(){
                   this.open = false
                    this.knowMoreButton = true
                    this.closeButton = false
                } ,
            }
        }
    </script>
@endsection
