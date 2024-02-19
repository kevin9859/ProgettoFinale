<x-layout>
    <div class="container-fluid p-5">
        <div class="row justify-content-center">
            <div class="col-md-4 bg-">
                <div class="p-6 text-center text-white">
                    <h1 class="display-1">
                            Lista Articoli
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3 mb-6">
        <!-- Form per il filtro per data    
            
            <div class="row justify-content-end mt-5">
            <div class="col-md-4">
                <form method="GET" action="{{ route('article.index') }}">
                    <div class="form-group filtro-form">
                        <label for="date">Filtra per data:</label>
                        <input type="date" id="date" name="date" class="form-control" placeholder="data">
                    </div>
                    <div class="form-group filtro-form">
                        <label for="readDuration">Filtra per tempo di lettura:</label>
                        <select id="readDuration" name="readDuration" class="form-control">
                            <option value="">Seleziona...</option>
                            <option value="5">Fino a 5 minuti</option>
                            <option value="10">Fino a 10 minuti</option>
                            <option value="15">Fino a 15 minuti</option>
                        
                          
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mx-5">Filtra</button>
                </form>
            </div>
        </div> -->
    
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
<script>
    document.getElementById('date').setAttribute('placeholder', 'data');
</script>