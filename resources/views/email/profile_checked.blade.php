@component('mail::message')
# HIi {{ $user->name }}

Someone checked your profile

@component('mail::button', ['url' => 'http://localhost:8000'])
Visit now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
