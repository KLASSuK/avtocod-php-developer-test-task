@extends('layouts.app')

@section('title_of_page')
    <title>Стена сообщений | Главная страница</title>
@endsection

@section ('h1')
    <h1>Сообщения от всех пользователей</h1>
@endsection

@section('content')
    <a href="{{ route('articles.create') }}" class="btn btn-primary form-control">Create New Article</a>
    @foreach ($articles as $article)
        <div class="row wall-message">
            <div class="col-md-1 col-xs-2">
                <img src="{{ $article->user->gravatar }}" alt="gravatar" class="img-circle user-avatar" /></div>
            <div class="col-md-11 col-xs-10">
                <p><strong>{{ $article->user->name }}:</strong></p>
                <div><a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
                </div>
                <blockquote>
                    {{ $article->body }}
                    <div>
                        @if(Auth::check() && $article->id_owner == Auth::user()->id)
                            <a href="{{ route('articles.edit',$article) }}" class="btn btn-info"> EDIT article
                                <form method="POST" action="{{ route('articles.delete',$article) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">DELETE article</button>
                                </form>
                            </a>
                        @endif
                    </div>
                </blockquote>
                {{--<div class="body">Log-info:</div>--}}
                {{--<div class="body"> Owner_email: <b>{{ $article->user->email }} </b></div>--}}
                {{--<div class="body"> Created by id_owner: <b>{{ $article->user->name }} </b></div>--}}
                {{--<div class="body"> Created by id_owner: <b>{{ $article->id_owner }} </b></div>--}}
                {{--<div class="body"> Name: <b> {{  $article->user->name }} </b></div>--}}
                {{--<div class="body"> ID of article: <b>{{ $article->id }} </b></div>--}}
                {{--<div>Time: <b>{{ $article->created_at->diffForHumans() }}</b></div>--}}
            </div>
        </div>
    @endforeach
@endsection
