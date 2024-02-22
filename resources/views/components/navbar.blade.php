<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
    <div class="container-fluid d-flex justify-content-between">
        <!-- Logo -->
        <div class="d-flex justify-content-start">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="/logo-home.png" alt="Logo" class="logo">
            </a>
        </div>
        <!-- Search bar -->
        <div class="d-flex justify-content-center custom-nav-link flex-grow-1">
            <form class="d-flex search-form custom-nav-link" method="GET" style="min-width: 300px;"
                action="{{ route('article.search') }}">
                <input class="form-control search-input" type="search" name="query" placeholder="Cosa stai cercando?"
                    aria-label="Search">
                <button class=" search-button" type="submit"style="color:green;">
                    <!-- SVG icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 20 20" height="20"
                        viewBox="0 0 24 24" width="24" focusable="false"
                        style="pointer-events: none; display: block; width: 75%; height: 75%;">
                        <path
                            d="m20.87 20.17-5.59-5.59C16.35 13.35 17 11.75 17 10c0-3.87-3.13-7-7-7s-7 3.13-7 7 3.13 7 7 7c1.75 0 3.35-.65 4.58-1.71l5.59 5.59.7-.71zM10 16c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
        @auth
            <div id="mySidebar" class="sidebar">
                <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</span>
                <a href="{{ route('article.careers') }}"><i class="menu-item fas fa-briefcase"></i> Lavora con noi</a>
                <a href="{{ route('article.create') }}"><i class="menu-item fas fa-plus-circle"></i> Inserisci un articolo</a>
                <a href="{{ route('article.index') }}"><i class="menu-item fas fa-list-ul"></i> Lista articoli</a>
                @if (Auth::user()->is_writer)
                    <a href="{{ route('writer.dashboard') }}"><i class="menu-item fas fa-user-edit"></i> Dashboard del Redattore</a>
                @endif
                @if (Auth::user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}"><i class="menu-item fas fa-user-cog"></i> Dashboard dell'Admin</a>
                @endif
                @if (Auth::user()->is_revisor)
                    <a href="{{ route('revisor.dashboard') }}"><i class="menu-item fas fa-user-check"></i> Dashboard del Revisore</a>
                @endif
                <a href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();"><i
                        class="menu-item fas fa-sign-out-alt"></i> Logout</a>
                <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                    @csrf
                </form>
            </div>

            <div id="main">
                <button class="openbtn bg-transparent custom-font" onclick="openNav()">☰ Benvenuto, {{ Auth::user()->name }}</button>
            </div>
        @endauth
        @guest
        <div class="d-inline-flex mx-0 align-items-center">
            <li class="d-flex nav-item align-items-center justify-content-center">
                <a class="d-flex nav-link  align-items-center" href="{{ route('login') }}">Accedi</a>
            </li>
            <li class="d-flex nav-item d-flex align-items-center justify-content-center">
                <a class="d-flex nav-link  align-items-center" href="{{ route('register') }}">Registrati</a>
            </li>
        </div>
        @endguest
    </div>
</nav>
<div class="custom-div rounded bg-dark-as-box text-center">
    <a href="">
        <div class=" text-center alert alert-saturn custom-alert custom-div">
            "ISCRIVITI ALLA NOSTRA
            <b>NEWSLETTER</b>
            PER RESTARE SEMPRE AGGIORNATO SULLE ULTIME NOTIZIE!"
        </div>
    </a>
</div>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "350px";
        document.getElementById("main").style.marginRight = "250px";
        document.querySelector(".openbtn").style.display = "none"; /* Nasconde il bottone */
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
        document.querySelector(".openbtn").style.display = "block"; /* Mostra il bottone */
    }
</script>
