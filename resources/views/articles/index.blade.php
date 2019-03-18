<h1>All Articles</h1>

<hr/>


@foreach ($articles as $article)
    <article>
        <h2>
            {{--<a href="{{$article->id}}"> {{ $article->text }}</a> так тоже можно но линки в коде хтмл будут кривые--}}
            {{--<a href="/articles/{{$article->id}}"> {{ $article->text }}</a>--}}
            <a href="{{ action('ArticlesController@show', [$article->id]) }}"> {{ $article->text }}</a>
            {{--<a href="{{ url('/articles', $articles->id) }}">{{ $article->text }}</a> этот сучий способ не зашел говорит нет свойства $key в этой коллекции--}}
        </h2>
        <div>{{ $article->published_at }}</div>
        <div class="body">{{ $article->username }}
            <a href="{{ $article->gravatar }}">Граватар пользюка</a>
            {{--дерьмо решение временная заглушка доработать хрефы для получения ссылки для граватара.--}}


        </div>
    </article>

@endforeach
