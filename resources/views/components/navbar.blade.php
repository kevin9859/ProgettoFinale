<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
    <div class="container-fluid d-flex justify-content-between">
        <!-- Logo -->
        <div class="d-flex justify-content-start">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="\logo.png" alt="Logo" class="logo">
                <span id="brand-text" class="text-white brand-text span-custom" style="font-family: 'Papyrus', sans-serif; font-weight: bold; text-transform: uppercase; letter-spacing: 2px;">The Aulab Post</span>
            </a>
        </div>
        <!-- Search bar -->
        <div class="d-flex justify-content-center custom-nav-link flex-grow-1">
            <form class="d-flex mt-1 my-2 my-lg-0 search-form custom-nav-link"  method="GET" style="min-width: 500px;" action="{{ route('article.search') }}">
                <input class="form-control me-2 search-input" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
                <button class="btn btn-outline-primary btn-lg search-button" type="submit">
                    <!-- SVG icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                        <path d="m20.87 20.17-5.59-5.59C16.35 13.35 17 11.75 17 10c0-3.87-3.13-7-7-7s-7 3.13-7 7 3.13 7 7 7c1.75 0 3.35-.65 4.58-1.71l5.59 5.59.7-.71zM10 16c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z"></path>
                    </svg>
                </button>
            </form>
        </div>

        <!-- Toggler and Offcanvas Navbar -->
        <div class="d-flex justify-content-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button> 

            <!-- Offcanvas Navbar -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        @auth
                        <!-- Other links -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white custom-nav-item" href="{{ route('article.careers')}}">Lavora con noi</a>
                        </li>
                        <!-- User Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white custom-nav-item" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Benvenuto, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                                <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item"> 
                            <a class="nav-link custom-nav-link mr-3" href="{{ route('register') }}">Registrati</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-nav-link" href="{{ route('login') }}">Accedi</a>
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
var collapseList = collapseElementList.map(function (collapseEl) {
  return new bootstrap.Collapse(collapseEl)
})
</script>
