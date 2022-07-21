<x-layouts.master>
    <x-slot:header>
        All Subscribers
    </x-slot:header>

    <x-slot:pageTitle>
        All Subscribers  | {{ config('app.name') }}
    </x-slot:pageTitle>
    @include('partials._subscribers')
</x-layouts.master>

