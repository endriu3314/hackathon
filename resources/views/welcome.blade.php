<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cotei</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background: rgb(38,75,119);
background: linear-gradient(180deg, rgba(38,75,119,1) 44%, rgba(64,69,82,1) 100%, rgba(0,212,255,1) 100%);
            color: #fff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        /* make keyframes that tell the start state and the end state of our object */
        @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

        .fade-in {
            opacity:0;
            -webkit-animation:fadeIn ease-in 1;
            -moz-animation:fadeIn ease-in 1;
            animation:fadeIn ease-in 1;

            -webkit-animation-fill-mode:forwards;
            -moz-animation-fill-mode:forwards;
            animation-fill-mode:forwards;

            -webkit-animation-duration:1s;
            -moz-animation-duration:1s;
            animation-duration:1s;
        }

        .fade-in.one {
            -webkit-animation-delay: 0.7s;
            -moz-animation-delay: 0.7s;
            animation-delay: 0.7s;
        }
        .fade-in.two {
            -webkit-animation-delay: 1.4s;
            -moz-animation-delay: 1.4s;
            animation-delay: 1.4s;
        }
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        a {
            color: #fff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        #cua{
            color: #101d2d;
            font-size:35px;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="fade-in one">
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <script type="text/javascript">
                    window.location = "{{ url('/home') }}";
                </script>
            @else
                <a class="fade-in two" href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a class="fade-in two" href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Cotei
        </div>


        <a class="fade-in two" id="cua" href="{{ route('login') }}">Cauti un angajat?</a>

    </div>
</div>
</body>
</html>
