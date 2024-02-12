<x-layout>
    <div class="container-fluid p-5 bg-dark text-white">
        <div class="row justify-content-center">
            <h1 class="display-1 h1"> {{ $article->title }} </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="custom-card">
                    <img src="{{ asset(Storage::url($article->image)) }}" class="card-img-top" alt="...">
                    <div class="custom-card-body">
                        <h2 class="card-title">{{ $article->subtitle }}</h2>
                        <p class="card-text text-muted fst-italic">
                            Redatto da {{ $article->user->name }} il {{ $article->created_at->format('d/m/Y') }}
                        </p>
                        <hr>
                        <p class="card-text">{{ $article->body }}</p>
                    </div>
                    <div class="card-footer bg-dark d-flex justify-content-between">
                        @if(Auth::user() && Auth::user()->is_revisor)
                            <div>
                                <a href="{{route('revisor.acceptArticle', ['article' => $article->id])}}" class="btn btn-success text-white my-2">Accetta articolo</a>
                                <a href="{{route('revisor.rejectArticle', ['article' => $article->id])}}" class="btn btn-danger text-white my-2">Rifiuta articolo</a>
                            </div>
                            <div>
                                <a href="{{ route('article.index') }}" class="btn btn-info text-white my-2">Torna indietro</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

