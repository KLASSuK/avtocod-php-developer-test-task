@extends('layouts.app')
@section('title_of_page')
    <title> Создание сообщения </title>
@endsection
@section('h1')
    <h1>Создание сообщения/статьи</h1>
@endsection
@section('content')
    <h1>Write a New Article</h1>
    <form method="post" action="{{ route('articles.create') }}" class="form-horizontal" accept-charset="UTF-8">
        @csrf
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

        <div class="controls">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Заголовок (Title):</label>
                    <textarea id="title" name="title" class="form-control"
                              placeholder="Ваш заголовок" rows="1"
                              required="required">{{ old('title') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="message_text">Текст сообщения:</label>
                    <textarea id="message_text" name="message_text" class="form-control"
                              placeholder="Ваше сообщение" rows="4"
                              required="required">{{ old('body') }}</textarea>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="date">ДАТА публикации статьи (Date):</label>--}}
                {{--<input type="datetime-local" name="published_at" id="published_at">--}}
                {{--</div>--}}
            </div>
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-success btn-send" value="Отправить сообщение" />
            </div>
        </div>
    </form>
@endsection
