@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <p class="mb-3 mt-3 darker-gray-txt">Register</p>
    </div>
</div>

<div class="row">
<div class="col-md-4 offset-md-4">
{{--
        <p class="mb-3 mt-3 darker-gray-txt"> Why register?</p>
        <ul class="mb-3">
            <!--li>To save your manuscripts permanently.</li-->
            <li>To make it easier for others to review your work and for them to get paid for it.</li>

        </ul>
 --}}
        <form action="{{url('post-registration')}}" method="POST" id="regForm" class="form-horizontal">
            {{ csrf_field() }}
            {{--<div class="form-label-group">
            <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" autofocus>
            <label for="inputName">Name</label>
            @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
            @endif
            </div>

            --}}
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>

                <div class="col-sm-9"><input type="email" name="email" id="inputEmail" class="form-control "  ></div>

                @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9"><input type="password" name="password" id="inputPassword" class="form-control" ></div>

                @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3">
                    <button class="btn btn-primary" type="submit">REGISTER</button>

                </div>
            </div>

        </form>

</div>
</div>

@stop
