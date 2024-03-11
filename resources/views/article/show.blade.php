<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="bg-white p-5 rounded shadow article-container">
                    <h1 class="display-4 mb-3 article-title text-center">{{ $article->title }}</h1>
                    <img src="{{ asset(Storage::url($article->image)) }}" class="article-image img-fluid rounded mb-4" alt="...">
                    <h2 class="h4 mb-3 text-muted article-subtitle">{{ $article->subtitle }}</h2>
                    <p class="text-muted fst-italic mb-4">
                        Redatto da {{ $article->user->name }} il {{ $article->created_at->format('d/m/Y') }}
                    </p>
                    <p class="text-dark article-body">{{ $article->body }}</p>
                    
                    @if(Auth::user() && Auth::user()->is_revisor)  
                    <div class="mt-5 article-details">
                      <a href="{{route('revisor.acceptArticle', ['article' => $article->id])}}" class="btn-modify text-white my-2">Accetta articolo</a>
                        <a href="{{route('revisor.rejectArticle', ['article' => $article->id])}}" class="btn-delete text-white my-2">Rifiuta articolo</a>
                        <a href="{{ route('article.index') }}" class="btn-read text-white my-2">Torna indietro</a>
                    </div>
                    @endif
                    <div class="comments-section" id="comments-section-{{ $article->id }}">
                        @foreach ($article->comments as $comment)
                        <div class="comment">
                            <div class="comment-user-name">{{ $comment->user->name }}</div>
                            <div class="comment-text">{{ $comment->body }}</div>
                            <div class="comment-actions">
                                <span id="likes-count-{{ $comment->id }}">{{ $comment->likes->count() }}</span>
                                <div class="like-comment-button" data-comment-id="{{ $comment->id }}" style="cursor: pointer;">
                                    <i class="fa fa-heart"></i>
                                </div>
                                @if(Auth::user() && Auth::user()->id == $comment->user_id)
                                    <form method="POST" action="{{ route('comment.destroy', $comment) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none;margin-bottom:5px;">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                    @endforeach
                    </div>
                    <div id="comment-form-{{ $article->id }}" class="comment-form-container">
                        <form class="comment-form" data-article-id="{{ $article->id }}">
                            @csrf
                            <input type="text" name="comment" class="comment-text" placeholder="Scrivi un commento...">
                            <button type="submit" class="submit-comment">Invia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
