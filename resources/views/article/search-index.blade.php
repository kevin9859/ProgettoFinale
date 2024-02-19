
<x-layout>
<div class="container-fluid p-5 bg-transparent text-center text-white">
    <div class="row justify-content-center">
        <h1 class="display-1">
                Tutti gli articoli per:  {{ $query }}

        <h1>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-around">
        @foreach($articles as $article)
        <div class="col-12 col-md-4 my-2">
            <div class="card">
                <div class="card-img">
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">


                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->subtitle }}</p>
                    <p class="card-text"><small class="text-muted">Tempo di lettura: {{ $article->readDuration() }} minuti</small></p>
                    <div class="tags">
                        @foreach($article->tags as $tag)
                           <span class="tag">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    @if ($article->category)
                    <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="small text-muted fst-italic text-capitalize">{{ $article->category->id }}</a>
                    @endif
                </div>
                <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                    @if ($article->user)
                    <a class="" href="{{ route('article.byUser', ['user' => $article->user->id]) }}">Redatto il {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}</a>
                    @endif
                    <a href="{{ route('article.show', ['article' => $article->id]) }}" class="btn btn-info text-white">Leggi</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</x-layout>
