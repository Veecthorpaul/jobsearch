@component('mail::message')

Hello {{$res}}, <br>
<h3>{{$mes}}</h3>

@component('mail::button', ['url' => $urls])

Click Here
@endcomponent
From your friend, {{$sen}}. <br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
