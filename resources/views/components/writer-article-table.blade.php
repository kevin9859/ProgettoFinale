<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Creato il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->subtitle}}</td>
            <td>{{$article->category->name ?? 'Non categorizzato'}}</td>
            <td>
             @foreach($article->tags as $tag)
             {{$tag->name}}
             @endforeach
            </td> 
            <td>{{$article->created_at->format('d/m/Y')}}</td>
            <td >
               
                <a href="{{route('article.show', ['article' => $article->id])}}" class="btn btn-read text-white">Leggi l'articolo</a>
                <a href="{{route('article.edit', ['article' => $article->id])}}" class="btn  btn-modify text-white mt-2">Modifica l'articolo</a>
                <form action="{{ route('article.destroy', ['article' => $article->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete text-white mt-2"type="submit">Elimina articolo</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>