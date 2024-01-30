@auth
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Benvenuto{{Auth::user()}}
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item"href="">Profilo</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item"href="#"onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
        <form method="post"action="{{route('logout')}}" id="form-logout" class="d-none">
            @csrf
        </form>
    </ul>
</li>
@endauth
@guest
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Benvenuto Ospite  
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
        <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
        <li>
            <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
        </li>
    </ul>
</li>
@endguest