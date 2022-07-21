
<form method="post" action="{{route('make_deposit')}}">
    @csrf
    <div class="form-group">
        <input type="hidden" name="user_id" value="{{auth()->id()}}">
        <label for="" class="form-label">Input Amount to Deposit</label>
        <input type="number" class="form-control" name="amount">
        <small class="text-muted">Minimum amount to deposit is ${{ number_format($subscription->plan->minimum_investment,2) }}</small>
    </div>
    <div class="form-group">
        <label for="selectedPlan" class="form-label">Selected Plan</label>
        <select name="plan_id" id="" class="form-control">
            <option value="{{$subscription->plan->id}}">{{$subscription->plan->name}}</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Confirm Deposit</button>
    <button @click="cancelDeposit" type="reset" class="btn btn-info">Cancel</button>
</form>

