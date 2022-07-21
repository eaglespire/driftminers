<x-layouts.client-master>
    <x-slot:pageTitle>My Profile</x-slot:pageTitle>
    <x-slot:title>{{ __('Profile | ') }} {{ auth()->user()->name }}</x-slot:title>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="card-columns">
                @include('partials._wallet')
                @include('partials._welcome')
                @include('partials._active_plan')
                @include('partials._all_plans')
                @include('partials._subscribe')
                @include('partials._transaction_history')
            </div>
        </div>
    </div>
</x-layouts.client-master>
