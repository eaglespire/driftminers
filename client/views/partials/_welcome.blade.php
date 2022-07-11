
<div class="card text-right">
    <img src="{{ asset('assets/crypto2/bitcoin-7168736.svg') }}" class="card-img-top" alt="...">
    <h5 class="card-header">Your Information</h5>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer">
                <small class="text-muted">
                    {{ auth()->user()->name }} <cite title="Source Title">FullName</cite>
                </small>
            </footer>
            <br>
            <footer class="blockquote-footer">
                <small class="text-muted">
                    {{ auth()->user()->email }} <cite title="Source Title">Email</cite>
                </small>
            </footer>
            <br>
            <footer class="blockquote-footer">
                <small class="text-muted">
                    {{ auth()->user()->username }} <cite title="Source Title">Username</cite>
                </small>
            </footer>
            <br>
            <footer class="blockquote-footer">
                <small class="text-muted">
                    {{ auth()->user()->created_at->toFormattedDateString() }} <cite title="Source Title">Date Registered</cite>
                </small>
            </footer>
        </blockquote>
    </div>
</div>
