@include('emails.layouts.headernotification')

{!! $email_content !!}

<div align='center'>
  <a href="{{ route('password.reset', ['token_id' => $token_id, 'email' => $email]) }}">Reset Password !</a>
</div>

{!! $email_content_bottom !!}

@include('emails.layouts.footernotification')