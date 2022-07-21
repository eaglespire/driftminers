
<div class="card">
    <img src="{{ asset('assets/crypto2/bitcoin-7168736.svg') }}" class="card-img-top" alt="...">
    <h5 class="card-header">Your Information</h5>
    <div class="card-body">
        <div>
            <cite title="Source Title">FullName - </cite>
            <small class="text-muted">
                {{ auth()->user()->name }}
            </small>
        </div>
        <div>
            <cite title="Source Title">Email - </cite>
            <small class="text-muted">
                {{ auth()->user()->email }}
            </small>
        </div>
        <div>
            <cite title="Source Title">Username - </cite>
            <small class="text-muted">
                {{ auth()->user()->username }}
            </small>
        </div>
        <div>
            <cite title="Source Title">Date Registered - </cite>
            <small class="text-muted">
                {{ auth()->user()->created_at->toFormattedDateString() }}
            </small>
        </div>
    </div>
</div>
