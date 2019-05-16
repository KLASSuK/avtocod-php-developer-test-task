@extends('layouts.app')
@section('title_of_page')
    <title>Сообщение с заголовком : {{ $article->title }} </title>
@endsection
@section('h1')
    <h1>Просмотр сообщения/статьи</h1>
@endsection
@section('content')
    <h4> Заголовок Статьи: </h4>
    {{ $article->title }}
        <h4> Текст : </h4>
        {{ $article->body }}
<hr/>
    <div> Created by id_owner: <b>{{ $article->user->name }}</b></div>
    <div> Date: <b>{{ $article->created_at->diffForHumans() }}</b></div>

    @if(Auth::check() && $article->id_owner == Auth::user()->id)
        <a href="{{ route('articles.edit',$article ) }}" class="btn btn-info"> EDIT article
            <form method="POST" action="{{ route('articles.delete',$article) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete article</button>
            </form>
        </a>
    @endif
@endsection
