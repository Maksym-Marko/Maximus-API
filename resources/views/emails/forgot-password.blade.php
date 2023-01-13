<x-mail::message>
# Hello

You are receiving this email because we received a password reset request for your account.

<x-mail::button :url="$url">
Reset Password
</x-mail::button>
<br>
Or copy this url to your browser <a href="{{$url}}">{{ $url }}</a>
<br>
<br>
This password reset link will expire in 60 minutes.
<br>
If you did not request a password reset, no further action is required.
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>