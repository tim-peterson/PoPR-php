@extends('layouts.app')


@section('content')

<div class="container">

    You don't need an account to use Popr, so why register?

 - To save your manuscripts permanently.
- Such that they are viewable without searching to make it easier for others to review it.
- To enable others to get credit for reviewing your work.


</div>

<form action="{{url('post-registration')}}" method="POST" id="regForm">
    {{ csrf_field() }}
    {{--<div class="form-label-group">
    <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" autofocus>
    <label for="inputName">Name</label>
    @if ($errors->has('name'))
    <span class="error">{{ $errors->first('name') }}</span>
    @endif
    </div>

    --}}
    <div class="form-label-group">
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
    <label for="inputEmail">Email address</label>
    @if ($errors->has('email'))
    <span class="error">{{ $errors->first('email') }}</span>
    @endif
    </div>
    <div class="form-label-group">
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
    <label for="inputPassword">Password</label>
    @if ($errors->has('password'))
    <span class="error">{{ $errors->first('password') }}</span>
    @endif
    </div>
    <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Register</button>
    <div class="text-center">
    <a  href="{{url('login')}}">login</a></div>
    </form>

    @stop
