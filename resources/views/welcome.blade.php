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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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


<body class="">
    <x-navbar />

    <div class="min-vh-100">

        @guest
            <div class="container-fluid p-5 bg-transparent text-center text-white">
                <div class="row justify-content-center">
                    <h1 class="display-1 welcome-guest">Benvenuto!</h1>
                    {{-- <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                    </div> --}}
                </div>
            </div>

        @endguest
        @if (Auth::user())
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/politica.jpg" alt="First slide"
                            style="object-fit: cover; height: 400px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/salvini.jpg" alt="Second slide"
                            style="object-fit: cover; height: 400px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/politica.jpg" alt="Third slide"
                            style="object-fit: cover; height: 400px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="container my-5">
                <div class="d-flex justify-content-around">
                    @foreach ($articles as $article)
                        <x-card :article="$article" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    </div>

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

</html>
