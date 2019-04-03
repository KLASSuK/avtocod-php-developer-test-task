@extends('layouts.app')
@section('title_of_page')
    <title> Редактирование выбранной статьи </title>
@stop

@section('content')
    <h1>Edit: {!!  $articles->title !!}</h1>
    {{--{{dd($articles)}}--}}
    <hr/>
    {{--<form method="POST" action="{{ route('articles.edit', ['id' => $id]) }}" accept-charset="UTF-8">--}}

    <form method="POST" action="" accept-charset="UTF-8">
        <input name="_method" type="hidden"
               value="PATCH">
        @csrf

        <div class="form-group">
            <label for="title">Заголовок (Title):</label>
            <input class="form-control" name="title" type="text" id="title" value="{!! $articles->title !!}">
        </div>
        <!--Body Form Input -->
        <div class="form-group">
            <label for="body">Тело статьи (Body):</label>
            <textarea class="form-control" name="body" cols="50" rows="10" id="body">{!! $articles->body !!}</textarea>
        </div>
        <!--Change Article Form Input -->
        <div class="form-group">
            <input class="btn btn-primary form-control" type="submit" value="Change Article">

            {{--<a href="{{ route('articles.update', request()->route('articles') ) }}" class="btn btn-danger"> EDIT article </a>--}}
            <a href="" class="btn btn-danger"> EDIT article </a>

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
