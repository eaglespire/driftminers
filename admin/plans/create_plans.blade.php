<x-layouts.master>
    <x-slot:pageTitle>
        Create New Plan | {{ config('app.name') }}
    </x-slot:pageTitle>
    <x-slot:header>
        Plans | Create New Plan
    </x-slot:header>
    @include('partials._create_plan')
</x-layouts.master>

