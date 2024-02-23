<a href="{{ route('article.show', ['article' => $article->id]) }}" class="card">
    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
    </div>
    <div class="card-footer text-muted">
        <div class="footer-content">
            <p>Redatto il {{ $article->created_at->format('d/m/Y') }} da
                {{ $article->user->name }}</p>
            <p class="small fst-italic text-capitalize text-muted">Tempo di lettura:
                {{ $article->readDuration() }} minuti</p>

            <div class="small fst-italic text-capitalize">
                @foreach ($article->tags as $tag)
                    {{ $tag->name }}
                @endforeach
                <p class="small text-muted fst-italic text-capitalize">
                    {{ $article->category->name }}</p>
            </div>
        </div>
    </div>
</a>
