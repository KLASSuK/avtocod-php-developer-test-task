<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .user-avatar {
            margin-top: 5px;
            width: 100%;
        }

        .wall-message {
            border: solid #eee;
            border-width: 0 0 1px 0;
            margin-bottom: 1em;
        }

        .wall-message:last-child {
            border-width: 0;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signup {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signup .form-signup-heading {
            margin-bottom: 10px;
        }

        .form-signup .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signup .form-control:focus {
            z-index: 2;
        }

        .form-signup input#user_login {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signup input#user_password {
            margin-bottom: -1px;
            border-radius: 0;
        }

        .form-signup input#user_password_repeat {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    @section('title_of_page')
        <title>Стена сообщений | Главная страница</title>
    @show
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/articles') }}">Avtocod | Стена сообщений</a>
        </div>

        <!-- Right Side Of Navbar -->

        @section('active_tab')
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->

                @guest
                    <li class="active"><a href="{{ route('articles.index') }}">Главная</a></li>
                    <li><a href="{{ route('login') }}">Авторизация</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Регистрация</a></li>
                    @endif
                @else
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</li>
                {{--<img style="width: 16px;" src="{{ Auth::user()->gravatar }}" alt="" class="img-circle user-avatar" />--}}
                <li><a class="logout-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-log-out"></span> {{ __('Выход') }}</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                @endguest

            </ul>
        @show

    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        @section('h1')
            <h1>Сообщения от всех пользователей</h1>
        @show
    </div>

    @section('content')
    @show
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>
