<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

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
                        <a href="/register" class="navbar-link">Register</a>
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


            @include('layouts.footer')
            <!-- Application Level Modals -->
            @if (Auth::check())
            {{--
                @include('modals.notifications')

                @include('modals.session-expired')

--}}
            @endif

            @include('modals.support')



        </div>

        <div
    </body>
</html>
