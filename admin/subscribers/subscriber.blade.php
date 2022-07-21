<x-layouts.master>
    <x-slot:pageTitle>
        Subscriber | {{ config('app.name') }}
    </x-slot:pageTitle>
    <x-slot:header>
        View {{ $subscriber->user->name }}
    </x-slot:header>
    @include('partials._subscriber')
</x-layouts.master>
