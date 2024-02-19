<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="bg-white p-5 rounded shadow">
                    <h1 class="display-4 mb-3 article-title">{{ $article->title }}</h1>
                    <img src="{{ asset(Storage::url($article->image)) }}" class="article-image img-fluid rounded mb-4" alt="...">
                    <h2 class="h4 mb-3 text-muted article-subtitle">{{ $article->subtitle }}</h2>
                    <p class="text-muted fst-italic mb-4">
                        Redatto da {{ $article->user->name }} il {{ $article->created_at->format('d/m/Y') }}
                    </p>
                    <p class="text-dark article-body">{{ $article->body }}</p>
                    @if(Auth::user() && Auth::user()->is_revisor)  
                    <div class="mt-5 article-details">
                        <a href="{{route('revisor.acceptArticle', ['article' => $article->id])}}" class="btn btn-success text-white my-2">Accetta articolo</a>
                        <a href="{{route('revisor.rejectArticle', ['article' => $article->id])}}" class="btn btn-danger text-white my-2">Rifiuta articolo</a>
                        <a href="{{ route('article.index') }}" class="btn btn-info text-white my-2">Torna indietro</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>

