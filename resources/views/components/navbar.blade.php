<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
    <div class="container-fluid d-flex ">
        <!-- Logo -->
        <div class="d-flex justify-content-start">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="/logo-home.png" alt="Logo" class="logo">
            </a>
        </div>
        <!-- Search bar -->
        <div class="d-flex justify-content-center custom-nav-link flex-grow-1">
            <form class="d-flex search-form custom-nav-link" method="GET"
                style="min-width: 300px; border: 1px solid #ccc; border-radius: 24px; overflow: hidden;"
                action="{{ route('article.search') }}">
                <input class="form-control search-input" type="search" name="query" placeholder="Cosa stai cercando?"
                    aria-label="Search" style="flex-grow: 1; border: none; padding: 10px 20px;">
                <button class="d-flex align-items-center justify-content-center search-button" type="submit"
                    style="background-color: #febd69; border: none; padding: 10px 20px; cursor: pointer; width: 50px; height: 50px;">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>


        <form method="GET" style="display: inline;">
            <select name="lang" onchange="this.form.submit()">
                <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="it" {{ App::getLocale() == 'it' ? 'selected' : '' }}>Italiano</option>
            </select>
        </form>
        @auth
            <div id="mySidebar" class="sidebar">
                <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</span>
                <a href="{{ route('article.careers') }}"><i class="menu-item fas fa-briefcase"></i> Lavora con noi</a>
                <a href="{{ route('article.create') }}"><i class="menu-item fas fa-plus-circle"></i> Inserisci un
                    articolo</a>
                <a href="{{ route('article.index') }}"><i class="menu-item fas fa-list-ul"></i> Lista articoli</a>
                @if (Auth::user()->is_writer)
                    <a href="{{ route('writer.dashboard') }}"><i class="menu-item fas fa-user-edit"></i> Dashboard del
                        Redattore</a>
                @endif
                @if (Auth::user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}"><i class="menu-item fas fa-user-cog"></i> Dashboard
                        dell'Admin</a>
                @endif
                @if (Auth::user()->is_revisor)
                    <a href="{{ route('revisor.dashboard') }}"><i class="menu-item fas fa-user-check"></i> Dashboard del
                        Revisore</a>
                @endif
                <a href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();"><i
                        class="menu-item fas fa-sign-out-alt"></i> Logout</a>
                <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                    @csrf
                </form>
            </div>

            <div id="navbarMenuButton">
                <button class="openbtn bg-transparent custom-font" onclick="openNav()">
                    <span class="menu-lines">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                </button>
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
        document.getElementById("navbarMenuButton").style.marginRight = "250px";
        document.querySelector(".openbtn").style.display = "none"; /* Hide the button */
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("navbarMenuButton").style.marginRight = "0";
        document.querySelector(".openbtn").style.display = "block"; /* Show the button */
    }

    // Add an event listener for click on the document
    document.addEventListener('click', function(event) {
        var sidebar = document.getElementById("mySidebar");
        var openButton = document.querySelector(".openbtn");
        // If the click event was not triggered by the sidebar or a child of it, and not by the open button, hide the sidebar
        if (!sidebar.contains(event.target) && !openButton.contains(event.target) && sidebar.style.width !==
            '0px') {
            closeNav();
        }
    });
</script>
