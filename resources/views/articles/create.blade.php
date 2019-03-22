@extends('layouts.app')
@section('content')
    <h1>Write a New Article</h1>

    <hr/>

    <form method="POST" action="{{url('/articles')}}" accept-charset="UTF-8">@csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" name="title" type="text" id="title">
        </div>
<!--Body Form Input -->
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" name="body" cols="50" rows="10" id="body"></textarea>
        </div>
<!--Add Article Form Input -->
        <div class="form-group">
            <input class="btn btn-primary form-control" type="submit" value="Add Article">
        </div>
    </form>
@stop
