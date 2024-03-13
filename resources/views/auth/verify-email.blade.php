<x-layout-bianco>

    <div class="container-fluid vh-100 p-5 bg-transparent text-center text-white">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="max-w-2xl mx-auto text-center" style="margin-bottom: 200px;">
                <h1 class="mt-4 text-black glitch-font align-items-center justify-content-end p-1"
                    style="font-size:50px;min-width:500px;max-width:1000px;">
                    Verifica il tuo indirizzo email prima!
                        <h5 class="mb-3 text-black">non hai ricevuto l'email?</h5>
                </h1>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class=" text-white btn btn-read">Rinvia Email di Conferma</button>
                </form>
                <div class="col-lg-5 col-md-8 col-sm-10 m-5" style="width: 100%;">
                    <img src="/images/conferma-mail.png" alt="Descrizione dell'immagine" class="img-fluid card-3 mb-4 "
                        style="width: 100%;">
                </div>

               
               
            </div>
        </div>
    </div>

</x-layout-bianco>