@component('mail::message')
Hello {{$user -> name}}.

{{ $user ->send_message}}
<br>
Thanks,<br>

{{config('app.name')}}

@endcomponent