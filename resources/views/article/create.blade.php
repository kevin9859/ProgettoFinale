<x-layout-create>
    <div class="container-fluid">
        <div class="row h-100 justify-content-center align-items-center">

            <div class="container-fluid p-0" style="background-color: white;">
                <div class="row  justify-content-end align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <img src="/images/ragazzo-create.gif" alt="Descrizione dell'immagine" class="img-fluid">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3 text-black">
                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">
                            Crea il tuo articolo!
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                <img src="/images/article-create-image.png" alt="Descrizione dell'immagine" class="img-fluid card-3">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                <form class="p-5 mb-5" action="{{ route('article.store') }}" method="post"
                enctype="multipart/form-data" style="max-width: 70%">
                @csrf
                <div>
                    <label for="title" class="form-label">Titolo</label>
                    <input name="title" type="text" class="form-control" id="title"
                        value="{{ old('title') }}">
                </div>
                
                <div>
                    <label for="subtitle" class="form-label">Sottotitolo</label>
                    <input name="subtitle" type="text" class="form-control" id="subtitle"
                        value="{{ old('subtitle') }}">
                </div>
                
            </div>
                <div class="container-fluid p-0" style="background-color: white;">
                    <div class="row  justify-content-center align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                            <div>
                                <label for="image" class="form-label">Seleziona un immagine</label>
                                <input name="image" type="file" class="form-control" id="image">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                            <img src="/images/image-upload.png" alt="Descrizione dell'immagine" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-0" style="min-height:200px;">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-8 m-3 d-flex">
                            <div>
                                <label for="category" class="form-label mt-4">Categoria:</label>
                                <select name="category" id="category" class="form-control text-capitalize">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                @foreach ($categories as $category)
                                    <label class="category-label text-decoration-none m-2">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="d-none">
                                        <div class="rounded-circle d-flex justify-content-center align-items-center bg-white " style="width: 100px; height: 100px; background-image: url('/images/{{ $category->name }}.png'); background-position: center; background-size: cover;">
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid h-100 p-0" style="background-color: white;">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-lg-4 col-md-3 col-sm-4 m-3">
                            <img src="/images/corpo-create2.png" alt="Descrizione dell'immagine" class="img-fluid">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 m-3">
                            <div>
                                <label for="body" class="form-label">Corpo del testo</label>
                                <textarea name="body" id="body" cols="30" rows="20" class="form-control">{{ old('body') }}</textarea>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="container-fluid h-100 p-0" style="">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                            <div>
                                <label for="tags" class="form-label">Tags</label>
                                <input name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
                                <span class="small fst-italic article-subtitle">Dividi ogni tag con una virgola</span>
                            </div>
                            
                            <div>
                                <button class="btn btn-read text-white mt-2">Inserisci un articolo</button>
                                <button class="btn btn-delete text-white mt-2 mx-3" href="{{ route('homepage') }}">Torna
                                    alla
                                    home</button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                            <img src="/images/tags-create.png" alt="Descrizione dell'immagine" class="img-fluid">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout-create>