@component('mail::message')
# Welcome to driftminers

We are excited to welcome you {{ $name }}.

@component('mail::button', ['url' => '/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
