@extends('layouts.app')
@section('content')
    <title>{{$article->title}}</title>

    <h1>{{$article->title}}</h1>


    <article>
        {{$article->body}}
    </article>

    <hr/>

    {{$article->published_at }}
    <div class="body"> {{$article->gravatar}}</div>
@stop