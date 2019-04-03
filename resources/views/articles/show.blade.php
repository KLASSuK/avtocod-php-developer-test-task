@extends('layouts.app')
@section('title_of_page')
    <title>Статья с Заголовком : {{ $article->title }} </title>
@stop

@section('content')
    <h1> Заголовок : {{ $article->title }} </h1>
    <hr/>

    <article>
        <h2> Текст : {{ $article->body }} </h2>
    </article>
    <div> Created by id_owner: <b>{{ $article->id_owner }}</b>
        <div>Date: {{ $article->created_at->diffForHumans() }}</div>
        @auth
            @if($article->id_owner == Auth::user()->id )
{{--DONT WORKING NOW--}}
                {{--<a href="{{ route('articles.edit', ['id'=>$id] }}" class="btn btn-danger"> EDIT article </a>--}}
                <a href="{{route('article.edit'), ['id'=>'id_owner']}}" class="btn btn-danger"> EDIT article </a>

            @endif
            {{--logged user stuff here--}}
            @else
            {{--guest stuff here--}}
        @endauth
@stop
