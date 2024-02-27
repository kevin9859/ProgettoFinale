<a href="{{ route('article.show', ['article' => $article->id]) }}" class="card-home">
    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->description }}</p>
    </div>
    <div class="card-footer">
        <h6>Comments</h6>
        @foreach ($article->comments as $comment)
            <p>{{ $comment->text }}</p>
        @endforeach
    </div>
</a>