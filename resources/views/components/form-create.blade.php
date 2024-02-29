<form class="card3 bg-white p-5 mb-5" action="{{ route('article.store') }}" method="post"
enctype="multipart/form-data">
@csrf
<div>
    <label for="title" class="form-label">Titolo:</label>
    <input name="title" type="text" class="form-control" id="title"
        value="{{ old('title') }}">
</div>

<div>
    <label for="subtitle" class="form-label">Sottotitolo:</label>
    <input name="subtitle" type="text" class="form-control" id="subtitle"
        value="{{ old('subtitle') }}">
</div>

<div>
    <label for="image" class="form-label">Immagine:</label>
    <input name="image" type="file" class="form-control" id="image">
</div>

<div>
    <label for="category" class="form-label">Categoria:</label>
    <select name="category" id="category" class="form-control text-capitalize">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="body" class="form-label">Corpo del testo:</label>
    <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{ old('body') }}</textarea>
</div>


<div>
    <label for="tags" class="form-label">Tags:</label>
    <input name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
    <span class="small fst-italic article-subtitle">Dividi ogni tag con una virgola</span>
</div>

<div>
    <button class="btn btn-read text-white mt-2">Inserisci un articolo</button>
    <button class="btn btn-delete text-white mt-2 mx-3" href="{{ route('homepage') }}">Torna
        alla
        home</button>
</div>
</form>