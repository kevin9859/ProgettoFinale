<x-layout-create>
    <div class="d-flex container-fluid">
        <div class="row h-100 justify-content-start align-items-center">


            <div class="d-flex container-fluid p-0" style="background-color: white;">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="m-3">
                        <img src="/images/ragazzo-create.gif" alt="Descrizione dell'immagine" style="max-width:30vw;"class="img-fluid">
                    </div>
                    <div class="m-3">
                        <h1 class="glitch-font mt-4 align-items-end justify-content-end p-3"
                            style="font-size:7vw; white-space: nowrap;">
                            Crea il tuo articolo
                        </h1>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-column">
                <div class="col-lg-4 col-md-6 col-sm-8 ">
                    <img src="/images/article-create-image.png" alt="Descrizione dell'immagine" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8 p-3">
                    <form class="p-5 mb-5" action="{{ route('article.store') }}" method="post"
                        enctype="multipart/form-data">
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

                    </form>
                </div>
            </div>
            <div class="container-fluid p-0" style="background-color: white;">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 col-12 p-3">
                        <div>
                            <label for="image" class="form-label glitch-font">Seleziona un immagine</label>
                            <input name="image" type="file" class="form-control" id="image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 col-12">
                        <img src="/images/image-upload.png" alt="Descrizione dell'immagine" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0" style="">
                <div class="d-flex h-100 justify-content-center align-items-center flex-nowrap">
                    <div class="d-flex flex-column align-items-center justify-content-center image-container p-3">
                        <img src="/images/category-create.png" alt="Immagine di prova" class="img-fluid mb-3" style="max-height: 500px;" >
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach ($categories as $category)
                            <div class="col-4">
                                <label class="category-label text-decoration-none p-3 text-center d-flex flex-column justify-content-center align-items-center">
                                    <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                        class="d-none category-checkbox">
                                    <div class="rounded-circle d-flex justify-content-center align-items-center bg-white mb-1 icon-fluid"
                                        style="background-image: url('/images/{{ $category->name }}.png'); background-position: center; background-size: cover; transition: transform .2s;">
                                    </div>
                                    <button type="button"
                                        class="mt-4 category-button button-glitch2 align-items-center justify-content-center icon-fluid"
                                        onmouseover="this.style.transform='scale(1.1)'"
                                        onmouseout="this.style.transform='scale(1)'">{{ $category->name }}</button>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container-fluid h-100 p-0" style="background-color: white;">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-3 col-sm-4">
                        <img src="/images/corpo-create2.png" alt="Descrizione dell'immagine" class="img-fluid">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-8 col-12 p-3">
                        <div>
                            <label for="body" class="form-label"
                                style="margin:0;font-size: 36px;font-family: 'Bebas Neue', cursive; ">Corpo del
                                testo</label>
                            <textarea name="body" id="body" cols="30" rows="20" class="form-control">{{ old('body') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid h-100 p-0" style="">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 p-3">
                        <div>
                            <label for="tags"
                                class="form-label"style="font-size: 22px;font-family: 'Bebas Neue', cursive; ">Tags</label>
                            <input name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
                            <span class="" style="font-size: 36px;font-family: 'Bebas Neue', cursive; ">Dividi
                                ogni tag con una virgola</span>
                        </div>

                        <div>
                            <button class="mt-4  button-glitch2 align-items-center justify-content-center">Crea   </button>
                            <a class="mt-4 button-glitch2 align-items-center justify-content-center ml-4" style="min-width:200px;"href="{{ route('homepage') }}">homepage</a>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
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
                        btn.parentElement.querySelector('.category-checkbox').checked = false;
                        btn.parentElement.querySelector('.rounded-circle').style.transform =
                            'scale(1)';
                    }
                });
                button.parentElement.classList.toggle('highlight');
                button.parentElement.classList.toggle('selected');
                button.parentElement.querySelector('.category-checkbox').checked = !button.parentElement
                    .querySelector('.category-checkbox').checked;
                button.parentElement.querySelector('.rounded-circle').style.transform = 'scale(1.1)';
            });
        });
    </script>
    <style>
        .category-label.selected .category-icon {
            transform: scale(1.1);
        }
    </style>
</x-layout-create>
