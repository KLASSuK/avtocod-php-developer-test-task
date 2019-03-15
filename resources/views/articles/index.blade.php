<h1>Articles</h1>

@foreach ($articles as $article)
    <article>
        <h2>{{ $article->text }}</h2>

        <div class="body">{{ $article->username }}</div>
    </article>

@endforeach
