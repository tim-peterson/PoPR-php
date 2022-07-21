<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>@yield('title')</title>
    </head>
    <body>


        <nav class="navbar navbar-inverse">
            <div class="container">
                <!-- Branding Image -->
                <a class="navbar-brand" href="/">Proof Of Peer Review </a>

                <div class="navbar-right" >
                    <a href="/about" class="navbar-link" >FAQ</a>

                    @if (auth()->user())
                       {{-- // the user is authenticated --}}
                    @else
                        <a class="navbar-link" href="/login">Login</a>
                        <!--a href="/register" class="navbar-link">Register</a-->
                    @endif
                    <a href="/donate" class="navbar-link" >Donate</a>

                                    {{--
                                <a class="btn" href="{{ url('auth/redirect') }}">
                                    Login with Twitter
                                </a>

                                <a class="btn" href="{{ url('login/twitter') }}">
                                    Login with Twitter a
                                </a>
                        --}}


                </div>
            </div>
        </nav>



        <div class="container">

            @if(session('success'))
            <small class="success">{{session('success')}}</small>
            @endif
            @yield('content')
        </div>

        <div
    </body>
</html>
