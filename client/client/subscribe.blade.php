<x-layouts.client>
    @if(count(PlanFacade::all()) != 0)
        <div class="card">
            <img src="{{ asset('assets/cryptocurrency-7156877_640.webp') }}" class="card-img-top" alt="...">
            <h5 class="card-header {{ $status ? 'text-danger' : null }}">
                {{ !$status ? 'Subscribe to a plan' : 'You already have a plan (active) or (inactive)' }}
            </h5>
            <div class="card-body">
                <form method="{{ !$status ? 'post' : null }}" action="{{ !$status ? route('subscribe_to_plan') : null }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{auth()->id()}}">
                        <label for="exampleInputEmail1" class="form-label">Please, choose a plan</label>
                        <select name="plan_id" id="" class="form-control" {{ $status ? 'disabled' : null }}>
                            @foreach(PlanFacade::all() as $plan)
                                <option value="{{$plan->id}}">{{$plan->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="form-label">Amount</label>
                        <input {{ $status ? 'disabled' : null }} type="number" name="amount" id="amount" class="form-control" required>
                    </div>

                    <button {{ $status ? 'disabled' : null }} type="submit" class="btn btn-primary" onclick="return confirm('Subscribe Now?')">Subscribe</button>
                    <button {{ $status ? 'disabled' : null }} type="reset" class="btn btn-info">Cancel</button>
                </form>
            </div>
        </div>
    @else
        <div class="card">
            <img src="{{ asset('assets/cryptocurrency-7156877_640.webp') }}" class="card-img-top" alt="...">
            <h5 class="card-header">Data not available</h5>
            <div class="card-body">
                No plans to show
            </div>
        </div>
    @endif
</x-layouts.client>
