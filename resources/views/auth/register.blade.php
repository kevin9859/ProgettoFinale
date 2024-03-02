<x-layout>
    
    <div class="container-fluid p-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 bg-transparent">
                <div class="p-3 text-center text-white">
                    <h1 class="button-glitch p-1" style="font-size:100px;">
                        REGISTER
                    </h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container ">
        <div class="row justify-content-center">
            <div clas="col-12 col-md-8">

                @if($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
                @endforeach
            </ul>
            </div>
             @endif
            <form class="card2 p-5 shadow" action="{{route('register')}}" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="username" class="form-label glitch-font2">Username:</label>
                <input name="name" type="text" class="form-control" id="username" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label glitch-font2">Email:</label>
                <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label glitch-font2">Password:</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label glitch-font2">Conferma Password:</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
            </div>
            <div class="mt-2">
               <button class="btn btn-read text-white ">Registrati</button>
                <p class="small mt-2">Gia registrato?<a href="{{route('login')}}"class="btn btn-read text-white ml2">Clicca qui</a></p>
            </div>
            </form>
            </div>
        </div>
    </div>
</x-layout>
            
                   

