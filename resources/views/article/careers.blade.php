<x-layout-careers>
    <div class="container-fluid">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="container-fluid bg-transparent text-center text-white d-flex justify-content-center align-items-center">
                <h1 class="glitch-font p-1" style="max-width:1000px; font-size:10vh;">
                    Lavora con noi
                </h1>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8 m-3">
                <img src="/images/image-careers.png" alt="Descrizione dell'immagine" class="img-fluid">
            </div>

            <div class="d-flex p-3 h50 main-div justify-content-end">
                <div class="col-lg-5 col-md-12 d-flex px-5">
                    <div class="welcome-text justify-content-start pl-5">
                        <span class="small-text">cosa</span>
                        <span class="large-text mx-3">farai?</span>
                    </div>
                </div>
            </div>
            <div class="d-flex p-5 h50 main-div justify-content-center">
                <div class="col-lg-5 col-md-12 px-3 ">
                    <h2 class="font-rounded mb-3 text-center mt-2">Ruoli nel nostro blog:</h2>
                    <div class="role-description font-rounded mb-4" style="font-size: 18px;">
                        <h4 class="text-center">Amministratore:</h4>
                        <p>Sei il "direttore d'orchestra" del blog, plasmi l'esperienza degli utenti e guidi il destino
                            del blog.</p>
                    </div>
                    <div class="role-description font-rounded mb-4" style="font-size: 18px;">
                        <h4 class="text-center">Revisore:</h4>
                        <p>Sei il custode della qualità e dell'eccellenza, perfezioni ogni articolo e ne assicuri la
                            professionalità.</p>
                    </div>
                    <div class="role-description font-rounded mb-4" style="font-size: 18px;">
                        <h4 class="text-center">Scrittore:</h4>
                        <p>Sei il narratore di storie, l'artista della parola, condividi idee e ispiri emozioni
                            attraverso ogni articolo.</p>
                    </div>
                </div>


            </div>
            <div class="col-lg-5 col-md-8 col-sm-10 m-3">
                <img src="/images/article-careers-image2.png" alt="Descrizione dell'immagine" class="img-fluid card-3">
            </div>
            <div class="col-lg-5 col-md-8 col-sm-10 m-3 mt-n5">
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
