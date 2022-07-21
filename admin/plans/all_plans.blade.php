<x-layouts.master>
    <x-slot:pageTitle>
        All Plans |  {{ config('app.name') }}
    </x-slot:pageTitle>
    <x-slot:header>
        Plans | All Plans
    </x-slot:header>
    @include('partials._admin_all_plans')
</x-layouts.master>

