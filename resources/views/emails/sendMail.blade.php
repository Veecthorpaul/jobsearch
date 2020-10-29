@component('mail::message')

Hello {{$rec}}, <br>
<h3>{{$mes}}</h3>

From, {{$nam}}. <br>
Email: {{$sen}}, <br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
