<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>@yield('title')</title>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a class="pull-left" href="/"><h3>Proof of peer review</h3></a>
{{--
                <a class="btn" href="{{ url('auth/redirect') }}">
                    Login with Twitter
                </a>

                <a class="btn" href="{{ url('login/twitter') }}">
                    Login with Twitter a
                </a>
--}}


@if (auth()->user())
    // the user is authenticated


    @else
     <a href="/login">Login</a>
     <!--a href="/register">Register</a-->
@endif


            </div>
        </div>
    </div>


        <div class="container">
            @yield('content')
        </div>

        <div
    </body>
</html>
