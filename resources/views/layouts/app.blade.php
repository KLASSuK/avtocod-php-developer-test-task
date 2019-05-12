<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title_of_page')

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
    </style>

    <title>Стена сообщений | Главная страница</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/articles') }}">Avtocod | Стена сообщений</a>
        </div>

        <!-- Right Side Of Navbar -->
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
            <li class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} </li>
            <li><a class="logout-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Выход') }} <span class="glyphicon glyphicon-log-out"></span> Выход</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
            </form>

            @csrf
            @endguest

        </ul>
    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        @section('h1')<h1>Сообщения от всех пользователей</h1>
        @show
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</body>
</html>
