<div class="card d-flex flex-column">
    <div class="">
        <p class="align-items-start text-start mb-3">{{ $article->user->name }}</p>
        <h5 class="card2-title">{{ $article->title }}</h5>
    </div>
    <img src="{{ Storage::url($article->image) }}" class="card2-img-top" alt="...">
    <div class="card2-footer text-muted d-flex flex-column align-items-center">
        <div class="footer-content d-flex flex-column align-items-start">
            <p>Redatto il {{ $article->created_at->format('d/m/Y') }}</p>
            <p class="small fst-italic text-capitalize text-muted">Tempo di lettura: {{ $article->readDuration() }} minuti</p>
            <div class="small fst-italic text-capitalize"style="text-align: left;font-size:12px;">
                @if ($article->tags)
                    @foreach ($article->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                @endif
                <p class="small text-muted fst-italic text-capitalize"style="text-align: left;font-size:12px;">
                    {{ $article->category->name }}</p>
            </div>
        </div> 
        <div class="card2-footer d-flex align-items-center justify-content-center">
            <div>
                <span class="mr-1 likes-count" id="likes-count-{{ $article->id }}">{{ $article->likes_count }}</span>
                <button type="button" class="btn-card {{ $article->isLikedByUser() ? 'liked' : '' }}"
                    data-article-id="{{ $article->id }}">
                    <i class="fa fa-heart"></i>
                </button>
                <span class="comment-icon" data-article-id="{{ $article->id }}">
                    <span class="comments-count ml-3">{{ $article->comments->count() }}</span>
                    <i class="fa fa-comment"style="font-size:20px;"></i>
                </span>
            </div> 
        </div> 
        <div class="card2-footer ml-auto d-flex mt-4 ml-auto">
            <a class="btn-read2" href="{{ route('article.show', ['article' => $article->id]) }}"
                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Leggi l'articolo</a>
        </div>
    </div> 
</div> 