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
                <div>
                    <a href="{{ action('ArticlesController@show', [$article->id]) }}"> Show article
                        №{{ $article->id }}</a>
                </div>
            </h2>
            <div>Tittle: {{ $article->title }}</div>

            <div>Body: {{ $article->body }} </div>

            <div class="body">Created by id_owner: <b>{{ $article->id_owner }}</b>

                <div>Date: {{ $article->created_at->diffForHumans() }}</div>
                <div>
                    @if($article->id_owner == Auth::user()->id )
                        <a href="{{ route('articles.edit',$article) }}" class="btn btn-info"> EDIT article </a>

                        <form method="POST" action="{{ route('articles.delete',$article) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete article</button>
                        </form>

                    @endif
                </div>
                <hr/>
            </div>
        </article>
    @endforeach
@endsection
