<nav class="navbar navbar-expand-lg bg-gradiente" style="height: 70px;">
    <div class="container-fluid d-flex ">
        <!-- Logo -->
        <div class="d-flex" style="width:20vw;">
            <a class="navbar-brand logo-container" href="{{ route('homepage') }}">
                <img src="/logo-home.png" alt="Logo" class="logo">
            </a>
        </div>
        <!-- Search bar -->
        <div class="d-flex justify-content-center align-items-center custom-nav-link mx-auto">
            <form class="d-flex search-form custom-nav-link" method="GET"
                style="border: 1px solid #ccc; border-radius: 24px; overflow: hidden;"
                action="{{ route('article.search') }}">
                <input class="form-control search-input" type="search" name="query"
                    style="font-size:1vh; flex-grow: 1; border: none; padding: 10px 20px; height: 30px;"
                    placeholder="Cosa stai cercando?" aria-label="Search">
                <button class="btn d-flex align-items-center justify-content-center search-button" type="submit"
                    style="border: none; padding: 10px 20px; cursor: pointer; width: 40px; height: 30px;">
                    <i class="fa fa-search" style="font-size: 20px;"></i>
                </button>
            </form>
        </div>
        @auth
            <div id="mySidebar" class="sidebar">
                <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</span>
                <a href="{{ route('homepage') }}"><i class="menu-item fas fa-home"></i> Home</a>
                {{-- <a href="{{ route('profile.show') }}"><i class="menu-item fas fa-user"></i> Profilo</a> --}}
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
    </div>
</nav>
<div class="custom-div rounded bg-dark-as-box text-center">
    <a href="">
        <div class=" text-center text-white alert-saturn custom-alert custom-div">
            "ISCRIVITI ALLA NOSTRA
            <b>NEWSLETTER</b>
            PER RESTARE SEMPRE AGGIORNATO SULLE ULTIME NOTIZIE!"
        </div>
    </a>
</div>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "300px";
        if (sidebar.style.width === "0px" || sidebar.style.width === "") {
            sidebar.style.width = "350px";
            document.getElementById("navbarMenuButton").style.marginRight = "250px";
            document.querySelector(".openbtn").style.display = "none";
        }
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("navbarMenuButton").style.marginRight = "0";
        document.querySelector(".openbtn").style.display = "block";

    }
    document.addEventListener('DOMContentLoaded', function() {
        closeNav();
        const navbarToggler = document.querySelector(".navbar-toggler");
        const navbarCollapse = document.querySelector(".navbar-collapse");
        const dropdownMenu = document.getElementById('navbarNavDropdown');

        if (navbarToggler) {
            navbarToggler.addEventListener("click", function() {
                document.body.classList.toggle("menu-open");
            });
        } else {
            console.log('Element with class .navbar-toggler not found');
        }

        if (dropdownMenu) {
            window.addEventListener('click', function(event) {
                if (!event.target.matches('.navbar-toggler') && dropdownMenu && !dropdownMenu.contains(
                        event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        } else {
            console.log('Element with id navbarNavDropdown not found');
        }

        var links = document.querySelectorAll('#mySidebar a');
        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                closeNav();
                setTimeout(function() {
                    window.location.href = link.href;
                }, 200);
            });
        });
    });

    document.addEventListener('click', function(event) {
        var sidebar = document.getElementById("mySidebar");
        var openButton = document.querySelector(".openbtn");

        if (!sidebar || !openButton) {
            return;
        }

        if (!sidebar.contains(event.target) && !openButton.contains(event.target) && sidebar.style.width !==
            '0px') {
            closeNav();
        }
    });
</script>
