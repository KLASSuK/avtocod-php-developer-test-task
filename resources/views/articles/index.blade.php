@extends('layouts.app')
@section('content')
    <h1>All Articles</h1>
    <a href="{{ route('article.create') }}" class="btn btn-danger">Create New Article</a>
    <hr/>
    @foreach ($articles as $article)
        <article>
            <h2>
                {{--<a href="{{$article->id}}"> {{ $article->text }}</a> так тоже можно но линки в коде хтмл будут кривые--}}
                {{--<a href="/articles/{{$article->id}}"> {{ $article->text }}</a>--}}
                <a href="{{ action('ArticlesController@show', [$article->id]) }}"> {{ $article->id }}</a>
                {{--<a href="{{ url('/articles', $articles->id) }}">{{ $article->text }}</a> этот сучий способ не зашел говорит нет свойства $key в этой коллекции--}}
            </h2>
            <div>Tittle: {{ $article->title }}</div>
            <div>Body: {{ $article->body }}</div>
            <div class="body">Created by: <b>{{ $article->username }}</b>
                <div>
                    <a href="{{ $article->gravatar }}">Граватар пользюка</a>
                </div>
                <hr/>
            </div>
        </article>
    @endforeach
@endsection