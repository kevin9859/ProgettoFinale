
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
        <div class="col-12 col-md-6 col-lg-4 my-3">
            <a href="{{ route('article.show', ['article' => $article->id]) }}" style="text-decoration: none; color: inherit;">
                <div class="card">
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title justify-content-center">{{$article->title}}</h5>
                        {{--<p class="card-text">{{$article->subtitle}}</p>--}}
                    </div>
                    <div class="card-footer text-muted p-footer">
                        <div class="footer-content">
                            <p class="p-footer">Redatto il {{ $article->created_at->format('d/m/Y') }} da {{$article->user->name}}</p>
                            <p class="small fst-italic text-capitalize text-muted ">Tempo di lettura: {{ $article->readDuration() }} minuti</p>
                            <p class="small text-muted fst-italic text-capitalize ">{{$article->category->name}}</p>
                            <div class="small fst-italic text-capitalize ">
                                @foreach($article->tags as $tag)
                                    {{$tag->name}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
</x-layout>
