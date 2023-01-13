<x-mail::message>
# Hello

Please click the button below to verify your email address.

<x-mail::button :url="$url">
Verify Email Address
</x-mail::button>
<br>
Or copy this url to your browser <a href="{{$url}}">{{ $url }}</a>
<br>
<br>
If you did not create an account, no further action is required.
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
