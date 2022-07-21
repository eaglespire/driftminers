
<x-layouts.master>
    <x-slot:pageTitle>
        Edit Plan | {{ config('app.name') }}
    </x-slot:pageTitle>
    <x-slot:header>
        Plans | Edit Plan
    </x-slot:header>
    @include('partials._edit_plan')
</x-layouts.master>
