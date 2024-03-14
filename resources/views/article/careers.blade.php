<x-layout-careers>
    <div class="container-fluid">
        <div class="row h-100 justify-content-center align-items-center">
            <div
                class="container-fluid  bg-transparent text-center text-white d-flex justify-content-center align-items-center">
                <h1 class="glitch-font p-1" style="width:1000px; font-size:100px;">
                    Lavora con noi
                </h1>
            </div>
            <div class="container-fluid h-100 p-0" style="">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <div>
                            <label for="tags"
                                class="form-label"style="font-size: 22px;font-family: 'Bebas Neue', cursive; ">Tags</label>
                            <input name="tags" id="tags" class="form-control" value="{{ old('tags') }}"
                                style="max-width: 500px;">
                            <span class="" style="font-size: 36px;font-family: 'Bebas Neue', cursive; ">Dividi
                                ogni tag con una virgola</span>
                        </div>

                        <div>
                            <button class="mt-4  button-glitch2 align-items-center justify-content-center">Inserisci un
                                articolo</button>
                            <a class="mt-4  button-glitch2 align-items-center justify-content-center ml-4"
                                href="{{ route('homepage') }}">Torna alla home</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                        <img src="/images/tags-create.png" alt="Descrizione dell'immagine" class="img-fluid"
                            style="max-width: 600px; max-height: 600px;">
                    </div>
                </div>
            </div>
            <div class="d-flex p-3 h50 main-div justify-content-end">
                <div class="col-lg-5 col-md-12 d-flex px-5">
                    <div class="welcome-text justify-content-start" style="padding-left: 20px;">
                        <span class="small-text"
                            style="font-family:'Roboto', sans-serif; font-size: 15px; letter-spacing: 1px;">perchè
                            abbiamo</span>
                        <span class="large-text mx-3"
                            style="font-family: 'Roboto', sans-serif; font-size: 24px; letter-spacing: 1px;">bisogno di
                            te</span>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between bg-white" style="padding: 20px;">
                <div class="col-lg-7 col-md-12 mb-5 d-flex justify-content-end mt-5">
                    

                    <div  class="min-vh100"style="max-width: 600px;">
                        {{-- <h2 class="font-rounded mb-3 text-center">Benvenuto!</h2> --}}
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">
                            Benvenuto nella nostra <strong>comunità giornalistica</strong>, dove ogni parola ha valore e
                            ogni storia trova spazio.</p>
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">La tua
                            voce è fondamentale qui. Scrivi articoli che incantano, stimolano e aprono nuovi orizzonti.
                        </p>
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Prenditi
                            un momento per lasciarti trasportare dal potere delle parole mentre esplori, crei e
                            condividi il tuo mondo con il nostro.</p>
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Cosa
                            stai aspettando? Crea un articolo adesso!</p>
                    </div>


                </div>

            </div>
            <div class="col-lg-5 col-md-8 col-sm-10 m-3">
                <img src="/images/article-careers-image2.png" alt="Descrizione dell'immagine" class="img-fluid card-3">
            </div>
            <div class="col-lg-5 col-md-8 col-sm-10 m-3 mt-n5"> <!-- Aggiunto mt-n5 qui -->
                <div class="form-container">
                    <form class="card-careers text-black bg-white p-5 mb-5" action="{{ route('careers.submit') }}"
                        method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="role" class="form-label text-start glitch-font">Per quale ruolo ti stai
                                candidando?</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Scegli qui</option>
                                <option value="admin">Amministratore</option>
                                <option value="revisor">Revisore</option>
                                <option value="writer">Redattore</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-start glitch-font">Email</label>
                            <input name="email"type="email" class="form-control"id="email"
                                value="{{ old('email') ?? Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label text-start glitch-font">Parlaci di te</label>
                            <textarea name="message" id="message" cols="30" rows="7"class="form-control">{{ old('message') }}</textarea>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-delete text-white">Invia la candidatura</button>
                        </div>
                    </form>
                </div>


</x-layout-careers>
