<x-layout>
</style>

<div class="container-fluid p-5 hg-info text-center text-white">
    <div class="row justify-content-center">
        <h1 class="display-1">
            Lavora con noi
        </h1>
    </div>
</div>

<div class="container my-5 ">
    <div class="row justify-content-center bg-white align-items-center border rounded p-2 shadow">
        <div class="col-12 col-md-6">
            <div class="role revisor">
                <h2 class="role-title">Admin</h2>
                <p class="role-description">Cosa farai: Gestione del sito, supervisione delle operazioni, ecc.</p>
            </div>
            
            <div class="role revisor">
                <h2 class="role-title">Revisor</h2>
                <p class="role-description">Cosa farai: Revisione dei contenuti, controllo della qualità, ecc.</p>
            </div>
            
            <div class="role writer">
                <h2 class="role-title">Writer</h2>
                <p class="role-description">Cosa farai: Scrittura e modifica di contenuti, ricerca, ecc.</p>
            </div>
        </div>
            <div class="col-12 col-md-6">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="p-5"action="" method="">
                @csrf
                <div class="mb-3">
                    <label for="role"class="form-label">Per quale ruolo ti stai candidando?</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Scegli qui</option>
                        <option value="admin">Amministratore</option>
                        <option value="revisor">Revisore</option>
                        <option value="writer">Redattore</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input  name="email"type="email" class="form-control"id="email" value="{{old('email') ?? Auth::user()->email}}">
                </div>
                <div class="mb-3">
                    <label for="message"class="form-label">Parlaci di te</label>
                    <textarea name="message" id="message" cols="30" rows="7"class="form-control">{{old('message')}}</textarea>
                </div>
                <div class="mt-2">
                    <button class="btn btn-info text-white">Invia la candidatura</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-layout>