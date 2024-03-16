<x-layout>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="bg-white p-5 rounded shadow article-container">
                    <h1 class="display-4 article-title text-center">{{ $article->title }}</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset(Storage::url($article->image)) }}" class="article-image img-fluid rounded mb-4" alt="...">
                    </div>
                    <h2 class="h4 mb-3 text-muted article-subtitle"style="font-size:1.8vh;">{{ $article->subtitle }}</h2>
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
                    <div class="comments-section mt-5" id="comments-section-{{ $article->id }}">
                        <h3 class="mb-4">Commenti</h3>
                        @foreach ($article->comments as $comment)
                            <div class="card mb-3 border-light shadow-sm">
                                <div class="card-header bg-transparent border-bottom-0">
                                    <h5 class="card-title mb-0">{{ $comment->user->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $comment->body }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 text-muted">
                                    <div class="comment-actions d-flex justify-content-between align-items-center">
                                        <div class="mr-2">
                                            <span id="likes-count-{{ $comment->id }}">{{ $comment->likes->count() }}</span>
                                            <button class="like-comment-button btn btn-outline-primary btn-sm" data-comment-id="{{ $comment->id }}">
                                                <i class="fa fa-heart"></i> Mi piace
                                            </button>
                                        </div>
                                        @if(Auth::user() && Auth::user()->id == $comment->user_id)
                                            <form method="POST" action="{{ route('comment.destroy', $comment) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Elimina
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="comment-form-{{ $article->id }}" class="comment-form-container mt-4">
                        <form class="comment-form" data-article-id="{{ $article->id }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="comment" class="form-control col-8" placeholder="Scrivi un commento...">
                                <div class="input-group-append col-4 p-0">
                                    <button type="submit" class="btn btn-primary rounded-left-0 w-100" style="background-color: #007bff; border-color: #007bff;">Invia</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</x-layout>