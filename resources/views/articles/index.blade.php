@extends('layouts.app')

@section('title_of_page')
    <title> Все статьи блога </title>
@stop

@section('content')
    <h1>All Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-danger">Create New Article</a>
    <hr/>
    @foreach ($articles as $article)
        <article>
            <h2>
                {{--<a href="/articles/{{$article->id}}"> {{ $article->text }}</a>--}}
                <a href="{{ action('ArticlesController@show', [$article->id]) }}"> {{ $article->id }}</a>
                {{--<a href="{{ url('/articles', $articles->id) }}">{{ $article->text }}</a> этот сучий способ не зашел говорит нет свойства $key в этой коллекции--}}
            </h2>
            <div>Tittle: {{ $article->title }}</div>

            <div>Body: {{ $article->body }} </div>

            <div class="body">Created by id_owner: <b>{{ $article->id_owner }}</b>

                <div>Date: {{ $article->created_at->diffForHumans() }}</div>
                <div>
                    {{--<a href="{{ $article->gravatar }}">Граватар пользюка</a>--}}
                    @auth
                        {{--<a href="Х" class="btn btn-info">ZAGLUSHKA</a>--}}
                        @if($article->id_owner == Auth::user()->id )
                            <a href="{{ route('articles.edit',$article) }}" class="btn btn-danger"> EDIT article </a>
                        @endif
                        {{--logged user stuff here--}}
                    @else
                        {{--guest stuff here--}}
                    @endauth
                </div>
                <hr/>
            </div>
        </article>
    @endforeach
@endsection
