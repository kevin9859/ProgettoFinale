<x-layout>
    <div class="container-fluid p-5 bg-transparent text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1 ">Benvenuto!</h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-3">
            @foreach($articles as $article)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $article->title }}</h5>
                            <p class="card-text text-secondary">{{ $article->subtitle }}</p>
                            <p class="small text-muted fst-italic text-uppercase">{{ $article->category->name }}</p>
                            <p class="small fst-italic text-uppercase">
                                @foreach($article->tags as $tag)
                                    #{{$tag->name}}
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-muted d-flex justify-content-between align-items-center">
                            <span class="small fst-italic">{{ $article->created_at->format('d/m/Y') }}</span>
                            <a href="{{route('article.show', ['article' => $article->id])}}" class="btn btn-sm btn-info">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

