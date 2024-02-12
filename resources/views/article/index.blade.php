<x-layout>
    <div class="container-fluid p-5">
        <div class="row justify-content-center">
            <div class="col-md-4 bg-">
                <div class="p-6 text-center text-white">
                    <h1 class="display-1">
              ...
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 my-3"> <!-- Ridimensiona le colonne per adattarsi a dispositivi di diverse dimensioni -->
                    <div class="card">
                        <img src="/images/card.jpg" class="card-img-top" alt=>
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->subtitle}}</p>
                            <p class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</p>
                            <p class="small fst-italic text-capitalize text-muted">Tempo di lettura: {{ $article->readDuration() }} minuti</p>
                            <div class="small fst-italic text-capitalize">
                                @foreach($article->tags as $tag)
                                    {{$tag->name}}
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <span>Redatto il {{ $article->created_at->format('d/m/Y') }} da {{$article->user->name}}</span>
                            <a href="{{ route('article.show', ['article' => $article->id]) }}" class="btn btn-info text-white">Leggi</a>
                            <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
