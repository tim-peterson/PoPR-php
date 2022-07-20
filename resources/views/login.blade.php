@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">

        <form action="{{url('post-login')}}" method="POST" id="logForm">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" >

                @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">

                @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button class="btn" type="submit">Log In</button>
            {{-- <div class="text-center">
            <a  href="{{url('registration')}}">Register</a></div>--}}
        </form>

       <p style="margin-top:3em"> You don't need an account to use POPR, so why register?</p>
        <ul>
            <li> To save your manuscripts permanently.</li>
            <li>  Such that they are viewable without searching to make it easier for others to review it.</li>
            <li> To enable others to get credit for reviewing your work.</li>
        </ul>

        <form action="{{url('post-registration')}}" method="POST" id="regForm">
            {{ csrf_field() }}
            {{--<div class="form-group">
            <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" autofocus>
            <label for="inputName">Name</label>
            @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
            @endif
            </div>

            --}}
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" >

                @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">

                @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button class="btn" type="submit">Register</button>
            {{-- <div class="text-center">
            <a  href="{{url('login')}}">login</a></div>--}}
        </form>


    </div>
    <div class="col-md"></div>
</div>
@stop
