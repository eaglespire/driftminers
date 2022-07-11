<div class="row">
    <div class="col-lg-10 col-md-12 col-12">
        <!-- Horizontal Form -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{__('Edit this Plan')}}</h3>
                <a onclick="event.preventDefault(); document.getElementById('delete-form').submit()" href="{{route('delete_plan', $plan->id)}}" class="btn btn-danger float-right">
                    <i class="fas fa-trash"></i> Delete Plan Instead
                </a>
                <form id="delete-form" action="{{route('delete_plan', $plan->id)}}" class="d-none" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{route('update_plan', $plan->id)}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $plan->id }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">{{__('Name')}}</label>
                        <div class="col-sm-10">
                            <input value="{{ $plan->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="{{__('Name')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">{{__('Description')}}</label>
                        <div class="col-sm-10">
                            <textarea  name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="{{__('Enter description')}}">{{ $plan->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">{{__('Return On Investment(ROI( in %))')}}</label>
                        <div class="col-sm-10">
                            <input value="{{ $plan->roi }}" name="roi" type="number" class="form-control @error('roi') is-invalid @enderror" id="roi" placeholder="{{__('ROI')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="minimum_investment" class="col-sm-2 col-form-label">{{__('Minimum Investment( in USD)')}}</label>
                        <div class="col-sm-10">
                            <input value="{{ $plan->minimum_investment }}" name="minimum_investment" type="number" class="form-control @error('minimum_investment') is-invalid @enderror" id="roi" placeholder="{{__('Minimum Investment')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="duration" class="col-sm-2 col-form-label">{{__('Duration(in days)')}}</label>
                        <div class="col-sm-10">
                            <input value="{{ $plan->duration }}" name="duration" type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="{{__('Duration (in days)')}}">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>

