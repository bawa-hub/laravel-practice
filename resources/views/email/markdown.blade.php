@component('mail::message')
# Welcome {{ $name }}

This is test markdown mail.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
