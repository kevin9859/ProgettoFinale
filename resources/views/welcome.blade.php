<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/65de18eb9131ed19d97256f8/1hnlp2mkm';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3"></script>
    <!-- Il resto del tuo codice -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3"></script>

    @vite(['public/css/app.css', 'public/js/app.js'])

    <title>The Aulab Post</title>
    <style></style>
</head>


<body class="bg-welcome">
    <x-navbar />

    <div>

        @guest
            <div class="container-fluid vh-100 p-5 bg-transparent text-center text-white">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-5 col-md-8 col-sm-10 m-3">
                        <img src="/images/welcome-image3.png" alt="Descrizione dell'immagine" class="img-fluid card-3 mb-4"
                            style="max-width: 100%;">
                    </div>
                    <div class="max-w-2xl mx-auto text-center">
                        <h1 class="mt-4 titolo-glitch align-items-center justify-content-end p-1"style="font-size:100px;min-width:1000px;margin-right:50px;">
                        
                           Benvenuto!
                        </h1>
                    </div>
                </div>
            </div>

        @endguest
        @if (Auth::user())
            {{-- <div class="container-fluid p-5 bg-transparent text-center ">
                <div class="d-flex row justify-content-center bg-white">
                    <h1 class="display-1 ">Benvenuto!</h1>
                    <h5>questi sono gli articoli più recenti </h5>
                </div>
            </div> --}}

            {{-- <a href="/path/to/article/creation" class="create-article d-block p-0">
                <div class=" text-center py-3">
                    <i class="fas fa-edit"></i>
                    <span class="text-white">Crea un articolo</span>

                </div>
            </a> --}}
            <!-- Aggiungi il tuo div qui -->
            <div class="text-center bg-white py-5 p-5">

            </div>

            <div class="d-flex  p-3 h50 main-div">
                <div class="col-lg-5 col-md-12 d-flex justify-content-start px-5">
                    <div class="welcome-text justify-content-start" style="padding-left: 20px;">
                        <span class="small-text"
                            style="font-family:'Roboto', sans-serif; font-size: 15px; letter-spacing: 1px;">Benvenuto
                            su</span>
                        <span class="large-text mx-3"
                            style="font-family: 'Roboto', sans-serif; font-size: 24px; letter-spacing: 1px;">The Aulab
                            Post</span>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between bg-white p-5 ">
                <div class="col-lg-7 col-md-12 mb-5 d-flex justify-content-end mt-5">

                    <div style="max-width: 600px;">
                        {{-- <h2 class="font-rounded mb-3 text-center">Benvenuto!</h2> --}}
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Entra
                            nella nostra
                            <strong>comunità giornalistica</strong>, dove ogni parola ha significato e ogni storia trova
                            spazio.
                        </p>
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">La tua
                            voce qui è
                            preziosa. Scrivi articoli che incantano, stimolano e aprono orizzonti nuovi.</p>
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Siediti
                            e lasciati trasportare dal potere delle parole mentre esplori, crei e
                            condividi il tuo mondo con il nostro.</p>
                        <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Cosa
                            aspetti? Crea un articolo ora!</p>
                    </div>


                </div>

                <div class="col-lg-5 col-md-12 d-flex justify-content-center">
                    <img src="images/welcome-desk.gif" alt="Descrizione dell'immagine" class="img-fluid"
                        style="max-width: 70%; max-heigt:480px;"> <!-- Added inline style to reduce image size -->
                </div>
            </div>
            {{-- <div class="text-center bg-dark py-5 p-5">
              
            </div> --}}
            <div class="d-flex justify-content-center bg-yellow2 ">

                <a  href="{{ route('article.create') }}"><button class="button-glitch align-items-center justify-content-center m-5">CREA UN ARTICOLO</button> </a>
               
                
                {{-- <div class="max-w-2xl mx-auto d-flex justify-content-center align-items-center text-center">
                    <h2 class="text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">
                        Domande più frequenti
                    </h2>
                </div> --}}
            </div>
            <div class=" m-0">
                <div class="container ">
                    <div class=" d-flex justify-content-around flex-wrap">
                        @foreach ($articles as $article)
                            <x-card :article="$article" />
                        @endforeach
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
<div class="d-flex justify-content-center bg-white h50">
    <div class="col-lg-7 col-md-12 mb-5 d-flex justify-content-start mt-5  duration-200 bg-white">
        <div class="col-lg-5 col-md-12 d-flex justify-content-start mr-10 bg-white ">
            <img src="images/Group.png" alt="Descrizione dell'immagine" class="img-fluid"
                style="min-width: 80%;"> <!-- Added inline style to reduce image size -->
        </div>
        <div class="d-flex flex-column justify-content-center" style="max-width: 600px; "> <!-- Increased margin-top -->
            {{-- <h2 class="font-rounded mb-3 text-center">Benvenuto!</h2> --}}
            <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Entra
                nella nostra
                <strong>comunità giornalistica</strong>, dove ogni parola ha significato e ogni storia trova
                spazio.
            </p>
            <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">La tua
                voce qui è
                preziosa. Scrivi articoli che incantano, stimolano e aprono orizzonti nuovi.</p>
            <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Siediti
                e lasciati trasportare dal potere delle parole mentre esplori, crei e
                condividi il tuo mondo con il nostro.</p>
            <p class="lead text-justify font-rounded mb-4 responsive-font" style="font-size: 20px;">Cosa
                aspetti? Crea un articolo ora!</p>
        </div>
    </div>
</div>

    </div>

    @endif

    <x-faq />
    <script>
        /*-------CORIANDOLI BENVENUTO---------*/
        var confettiInterval = setInterval(function() {
            confetti({
                particleCount: 10,
                angle: 90,
                spread: 45,
                origin: {
                    x: Math.random(),
                    y: 0
                }, // Randomize x origin for a more natural effect
                colors: ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'],
                zIndex: 1000 // Increase zIndex to have confetti fall over other page elements
            });
        }, 100);

        setTimeout(function() {
            clearInterval(confettiInterval);
        }, 5000); // Stop after 5 seconds
    </script>
</body>
<x-footer />

</html>
