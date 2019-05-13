@extends('layouts.app')
@section('title_of_page')
    <title> Редактирование выбранной статьи </title>
@stop
@section('h1')
    <h1>Редактирование сообщения/статьи</h1>
@endsection
@section('content')
    <h1>Edit: {!!  $articles->title !!}</h1>
    <hr/>
    <form method="POST" action="{{ route('articles.edit', ['id' => $id]) }}" accept-charset="UTF-8">

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
            <input class="btn btn-primary form-control" type="submit" value="Edit Article">
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Ошибка!</strong>

            <ul class="alert-alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop
