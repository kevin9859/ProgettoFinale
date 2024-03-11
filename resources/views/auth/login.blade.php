<x-layout>
    <div class="container-fluid p-5 bg-transparent text-center text-white">
        <div class="row justify-content-center">
            <h1 class="button-glitch p-1"style="font-size:100px;max-width:400px;">
               accedi
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="card2 justify-content-center shadow " action="{{route('login')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label glitch-font" style="font-size:25px;">Email:</label>
                        <input name="email" type="email" class="form-control " id="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label glitch-font" style="font-size:25px;">Password:</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-read text-white ">Accedi</button>
                        <div class="align-items">
                            <p class="small flex-align" style="font-size:15px;">Non sei registrato?<a href="{{route('register')}}" class="btn btn-read text-white ml2">Clicca qui</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
