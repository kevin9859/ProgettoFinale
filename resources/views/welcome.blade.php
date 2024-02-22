


         
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
        @vite(['public/css/app.css','public/js/app.js'])
    
        <title>The Aulab Post</title>
    </head>

 
    <body class="">
        <x-navbar/>
 
        <div class="min-vh-100">
            
    @guest
    <div class="container-fluid p-5 bg-transparent text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1 welcome-guest">Benvenuto!</h1>
        </div>
    @endguest    
        @if (Auth::user())
        <div class="container-fluid p-5 bg-transparent text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">Benvenuto!</h1>
        </div>
        <div>
            <h5 class="display-9 mt-4">
                questi sono gli articoli in primo piano...
            </h5>
        </div>
    </div> <!-- Questo è il tag di chiusura che è stato spostato -->
    
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)
            <div class="col-12 col-md-6 col-lg-4 my-3">
                <a href="{{ route('article.show', ['article' => $article->id]) }}" style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            {{--<p class="card-text">{{$article->subtitle}}</p>--}}
                        </div>
                        <div class="card-footer text-muted">
                            <div class="footer-content">
                                <p>Redatto il {{ $article->created_at->format('d/m/Y') }} da {{$article->user->name}}</p>
                                <p class="small fst-italic text-capitalize text-muted">Tempo di lettura: {{ $article->readDuration() }} minuti</p>
                               
                                <div class="small fst-italic text-capitalize">
                                    @foreach($article->tags as $tag)
                                        {{$tag->name}}
                                    @endforeach 
                                <p class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
        @endif
    </div>
        </div>
    <!-- Il resto del tuo codice -->
        
       <footer class="footer">
              <ul class="social-icon">
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <ion-icon name="logo-facebook"></ion-icon>
                  </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <ion-icon name="logo-twitter"></ion-icon>
                  </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                  </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                  </a></li>
              </ul>
              <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="#">About</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Services</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>
          
              </ul>
              <p>&copy;2024 Kevin Lapi  | All Rights Reserved</p>
            </footer>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
    </html>
    