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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['public/css/app.css', 'public/js/app.js'])
    <title>The Aulab Post</title>

</head>

<body class="@auth bg-base @endauth @guest background-div @endguest">
    <div class="container2">
        <x-navbar />

        <div class ="container-fluid2">
            <div>
                @guest
                    <div
                        class="container-fluid vh-100 p-5 bg-transparent text-center text-white d-flex justify-content-center align-items-center">
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="" style="margin-bottom: 12.5em;">
                                <h1 class="mt-4 font-bold align-items-center justify-content-center p-1 d-flex"
                                    style="font-size:6.25em;min-width:;">
                                    Benvenuto!
                                    <a href="{{ route('login') }}" class="font-bold btn btn-primary"
                                        style="font-size: 1.4vw;">Inizia ora</a>
                                </h1>
                            </div>
                        </div>
                    </div>
                @endguest

                @if (Auth::user())
                <div class="d-flex container-fluid pt-5 px-5 h100 main-div">
                    <div class="col-lg-5 col-md-12 d-flex justify-content-start px-5">
                        <div class="welcome-text justify-content-start" style="">
                            <span class="small-text"
                                style="font-family:'Roboto', sans-serif; font-size: 1.4vh; letter-spacing: 1px;">Benvenuto
                                su</span>
                            <span class="large-text mx-3"
                                style="font-family: 'Roboto', sans-serif;font-size: 1.7vh; letter-spacing: 1px;">The
                                Aulab
                                Post</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between bg-white flex-lg-row flex-column container-fluid" style="padding: 8vh;">
                <div class="col-lg-6 col-md-12 mb-3 d-flex justify-content-center mt-5 mx-auto text-margin">
                    <div class="d-flex flex-column justify-content-center align-items-center min-vh100 mt-5 text-center" style="max-width: 600px;">
                            <p class="lead text-justify font-rounded " style="font-size:1em;margin-bottom:2vh;">
                                Benvenuto nella nostra <strong>comunità giornalistica</strong>, dove ogni parola ha valore e ogni storia trova spazio.
                            </p>
                            <p class="lead text-justify font-rounded" style="font-size:1em;margin-bottom:2vh;">
                                La tua voce è fondamentale qui. Scrivi articoli che incantano, stimolano e aprono nuovi orizzonti.
                            </p>
                            <p class="lead text-justify font-rounded " style="font-size: 1em;margin-bottom:2vh;">
                                Prenditi un momento per lasciarti trasportare dal potere delle parole mentre esplori, crei e condividi il tuo mondo con il nostro.
                            </p>
                            <p class="lead text-justify font-rounded  " style="font-size: 1em;margin-bottom:2vh;">
                                Cosa stai aspettando? Crea un articolo adesso!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 d-flex justify-content-center align-items-center mx-auto image-margin">
                        <img src="images/hello.gif" class="img-fluid" alt="Responsive image">
                    </div>
                </div>

                    <div class="d-flex justify-content-center bg-yellow2 container-fluid">

                        <a href="{{ route('article.create') }}"><button class="button-glitch align-items-center justify-content-center m-4">CREA UN ARTICOLO</button></a>
                  
                    </div>
                    <div class="row row-no-margin container-fluid custom-flex">
                        <div class="custom-flex">
                            @foreach ($articles as $article)
                                <div class="col custom-flex" style="justify-content: center;">
                                    <x-card :article="$article" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex p-3 h50 main-div justify-content-end container-fluid">
                        <div class="col-lg-5 col-md-12 d-flex px-5">
                            <div class="welcome-text justify-content-start" style="padding-left: 20px;">
                                <span class="small-text"
                                    style="font-family:'Roboto', sans-serif; font-size: 1.4vh; letter-spacing: 1px;">perchè
                                    abbiamo</span>
                                <span class="large-text mx-3"
                                    style="font-family: 'Roboto', sans-serif; font-size: 1.7vh; letter-spacing: 1px;">bisogno
                                    di
                                    te</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center bg-white flex-lg-row flex-column container-fluid" style="padding: 8vh; height: 100vh;">
                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center mb-5 mt-5">
                            <div class="d-flex justify-content-center flex-grow-1">
                                <img src="images/Group.png" class="img-fluid" alt="Responsive image" style="min-width:350px;height:50vh;">
                            </div>
                            <div class="d-flex flex-column justify-content-center mx-md-3 flex-grow-1" style="max-width: 600px;">
                                <p class="lead text-justify font-rounded mb-4" style="font-size:1em;margin-bottom:2vh;">Siamo sempre alla ricerca di menti curiose e appassionate come la tua per arricchire il nostro sito con punti di vista unici e freschi.</p>
                                <p class="lead text-justify font-rounded mb-4 " style="font-size:1em;margin-bottom:2vh;">Se hai un'opinione da condividere, una passione da esprimere o semplicemente un interesse per la scrittura giornalistica, il nostro sito è il posto perfetto per te!</p>
                                <p class="lead text-justify font-rounded mb-4" style="font-size:1em;margin-bottom:2vh;">Unisciti a noi e lascia il tuo segno nel mondo delle notizie online. Siamo sicuri che il tuo contributo porterà nuova vita e vivacità al nostro sito!</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        @endif
        <x-faq />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="/js/script.js"></script>

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
                    },
                    colors: ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'],
                    zIndex: 1000
                });
            }, 100);

            setTimeout(function() {
                clearInterval(confettiInterval);
            }, 5000);

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
    </div>
    <x-footer />

</body>

</html>
