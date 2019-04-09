@extends('layouts.app')
@section('title_of_page')
    <title> Создание статьи </title>
@stop

@section('content')
    <h1>Write a New Article</h1>

    <form method="POST" action="{{url('/articles/edit')}}" accept-charset="UTF-8">@csrf
        <!--Title Form Input -->
        <div class="form-group">
            <label for="title">Заголовок (Title):</label>
            <input class="form-control" name="title" type="text" id="title">
        </div>
        <!--Body Form Input -->
        <div class="form-group">
            <label for="body">Тело статьи (Body):</label>
            <textarea class="form-control" name="body" cols="50" rows="10" id="body"></textarea>
        </div>



        <div class="form-group">
            <label for="date">ДАТА публикации статьи (Date):</label>
            <input type="date" id="data" name="dddddddddddtrip-start"
            {{--value="{{carbon::now}}"--}}
            {{--min="{{carbon::now}}">--}}
            >
        </div>



        <!--Add Article Form Input -->
        <div class="form-group">
            <input class="btn btn-primary form-control" type="submit" value="Add Article">
        </div>
    </form>

    @if ($errors->any())
        <ul class="alert-alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
