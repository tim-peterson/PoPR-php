
@if($user->name == $user->email)

<p>Hey there,</p>

@else
<p>Hey {{$user->name}},</p>

@endif 

<p> Welcome to the TR Prize. </p>

@if(isset($user->human_password))
<p> Your login password is <b>{{ $user->human_password }}</b>.</p>
@endif

<p>No action is needed with this email. We simply wanted to confirm your email.</p>

Please let us know if you have any questions at support@trprize.org or see our <a href="{!! url('/about') !!}">About</a> page.


