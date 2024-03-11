<x-layout-create>
    <div class="d-flex container-fluid">
        <div class="row h-100 justify-content-start align-items-center">

          <div class="d-flex container-fluid p-0" style="background-color: white;">
                <div class="row  justify-content-start align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <img src="/images/ragazzo-create.gif" alt="Descrizione dell'immagine" class="img-fluid">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <h1 class="mt-4 titolo-glitch align-items-center justify-content-center p-1"style="font-size:100px;min-width:750px;margin-right:50px;">
                        
                            Crea il tuo articolo
                        </h1>
                      
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
                        <label for="title" class="form-label glitch-font">Titolo</label>
                        <input name="title" type="text" class="form-control" id="title"
                            value="{{ old('title') }}">
                    </div>

                    <div>
                        <label for="subtitle" class="form-label glitch-font">Sottotitolo</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle"
                            value="{{ old('subtitle') }}">
                    </div>

            </div>
            <div class="container-fluid p-0" style="background-color: white;">
                <div class="row  justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <div>
                            <label for="image" class="form-label glitch-font" >Seleziona un immagine</label>
                            <input name="image" type="file" class="form-control" id="image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <img src="/images/image-upload.png" alt="Descrizione dell'immagine" class="img-fluid">
                    </div>
                </div>
            </div>
             <div class="container-fluid p-0" style="min-height:200px;">
                <div class="row h-100 justify-content-start align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3 d-flex flex-row align-items-center">
                        <img src="/images/category-create.png" alt="Immagine di prova" class="img-fluid mb-3"
                            style="max-width:70%;margin-right:100px;">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex justify-content-center">
                                @foreach ($categories as $category)
                                <label class="category-label text-decoration-none m-3 text-center">
                                    <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                        class="d-none category-checkbox">
                                        <div class="rounded-circle d-flex justify-content-center align-items-center bg-white mb-1 category-icon"
                                            style="width: 100px; height: 100px; background-image: url('/images/{{ $category->name }}.png'); background-position: center; background-size: cover; transition: transform .2s;">
                                        </div>
                                        <button type="button" class="mt-4 category-button button-glitch2 align-items-center justify-content-center"
                                        style="width: 190px; height: 43px; font-size: 18px;"
                                        onmouseover="this.style.transform='scale(1.1)'"
                                        onmouseout="this.style.transform='scale(1)'">{{ $category->name }}</button>
                                    </label>
                                @endforeach
                            </div>
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
                            <label for="body" class="form-label" style="font-size: 36px;font-family: 'Bebas Neue', cursive; ">Corpo del testo</label>
                            <textarea name="body" id="body" cols="30" rows="20" class="form-control">{{ old('body') }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid h-100 p-0" style="">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <div>
                            <label for="tags" class="form-label"style="font-size: 22px;font-family: 'Bebas Neue', cursive; ">Tags</label>
                            <input name="tags" id="tags" class="form-control" value="{{ old('tags') }}" style="max-width: 500px;">
                            <span class="" style="font-size: 36px;font-family: 'Bebas Neue', cursive; ">Dividi ogni tag con una virgola</span>
                        </div>
                           

                        <div>
                            <button class="mt-4  button-glitch2 align-items-center justify-content-center">Inserisci un articolo</button>
                            <a class="mt-4  button-glitch2 align-items-center justify-content-center ml-4"
                            href="{{ route('homepage') }}">Torna alla home</a>
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
    
    <script>
const buttons = document.querySelectorAll('.category-button');
buttons.forEach(button => {
    button.addEventListener('click', () => {
        buttons.forEach(btn => {
            if (btn !== button) {
                btn.parentElement.classList.remove('highlight');
                btn.parentElement.classList.remove('selected');
                btn.parentElement.querySelector('.category-checkbox').checked = false; // Uncheck the checkbox
            }
        });
        button.parentElement.classList.toggle('highlight');
        button.parentElement.classList.toggle('selected');
        button.parentElement.querySelector('.category-checkbox').checked = !button.parentElement.querySelector('.category-checkbox').checked; // Toggle the checkbox
    });
});
    </script>
    <style>
        .category-label.selected .category-icon {
            transform: scale(1.1);
        }
    </style>
</x-layout-create>
