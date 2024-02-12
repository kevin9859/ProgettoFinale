<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="\logo.png" alt="logo" class="logo">
            <span id="brand-text" class="brand-text span-custom aulab-post">The Aulab Post</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
             
            </ul>
            <form class="d-flex mx-auto mt-1 ms-2 my-2 my-lg-0 px-" method="GET" action="{{ route('article.search') }}">
                <input class="form-control me-2" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search" style="width: 500px; height:44px">
                <button class="btn btn-outline-primary btn-lg" type="submit" style="width: 100px; height:44px">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                        <path d="m20.87 20.17-5.59-5.59C16.35 13.35 17 11.75 17 10c0-3.87-3.13-7-7-7s-7 3.13-7 7 3.13 7 7 7c1.75 0 3.35-.65 4.58-1.71l5.59 5.59.7-.71zM10 16c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z"></path>
                    </svg>
                </button>
            </form>
            
            
            
            
            
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                     @auth
                     <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       
                            <li><a class="dropdown-item" href="">Benvenuto, {{ Auth::user()->name }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('article.create')}}">Inserisci un articolo</a></li>
                            <li><a class="dropdown-item" href="{{ route('article.index')}}">Lista articoli</a></li>
                            
                            <li><hr class="dropdown-divider"></li>
                            @if (Auth::user()->is_writer)
                                <li><a class="dropdown-item" href="{{ route('writer.dashboard') }}">Dashboard del Redattore</a></li>
                            @endif
                            @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard dell'Admin</a></li>
                            @endif
                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard del Revisore</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profilo</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                            <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                                @csrf
                            </form>
                        @endauth
                        
                    </ul>
                </li>
                @guest
                <li class="nav-item custom-nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('register') }}">Registrati</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('login') }}">Accedi</a>
                </li>
                
                
                @endguest
            </ul>
        </div>
    </div>
</nav>


