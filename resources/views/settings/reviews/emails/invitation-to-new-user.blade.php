Hi!

<br><br>

{{ $invitation->review->owner->name }} has invited you as a co-author on the manuscript, {{ Spark::teamString() }}! If you do not already have an account,
you may click the following link to get started:

<br><br>

<a href="{{ url('register?invitation='.$invitation->token) }}">{{ url('register?invitation='.$invitation->token) }}</a>

<br><br>

See you soon!
