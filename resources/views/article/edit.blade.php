<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">Modifica un articolo</h1>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="card p-5 shadow" action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $article->title }}">
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo</label>
            <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{ $article->subtitle }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input name="image" type="file" class="form-control" id="image">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria:</label>
            <select name="category" id="category" class="form-control text-capitalize">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ ($article->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Corpo del testo:</label>
            <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{ $article->body }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags:</label>
            <input name="tags" id="tags" class="form-control" value="{{ implode(',', $article->tags->pluck('name')->toArray()) }}">
            <span class="small fst-italic">Separare ogni tag con una virgola</span>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-info text-white">Aggiorna articolo</button>
            <a href="{{ route('home') }}" class="btn btn-outline-info">Torna alla home</a>
        </div>
    </form>
</x-layout>

