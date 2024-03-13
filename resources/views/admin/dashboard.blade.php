<x-layout>

    <div class="container-fluid p-5 bg-transparent text-center text-white">
        <div class="row justify-content-center">
            <h1 class="font-bold display-1">
                Bentornato, Amministratore
            </h1>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{session('success')}}
    </div>
    @endif
    <div class="container-2 my-2">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo di amministratore</h2>
                <x-request-table :roleRequests="$adminRequests" role="amministratore"></x-request-table>
            </div>
        </div>
    </div>
    <div class="container-2 my-2">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo di revisore</h2>
                <x-request-table :roleRequests="$revisorRequests" role="revisore"></x-request-table>
            </div>
        </div>
    </div>
    <div class="container-2 my-2">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo di redattore</h2>
                <x-request-table :roleRequests="$writerRequests" role="redattore"></x-request-table>
            </div>
        </div>
    </div>

    <hr>
    <div class="container-2 my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>I tags della piattaforma</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags"></x-metainfo-table>
            </div>
        </div>
    </div>
    <div class="container-2 my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Le categorie della piattaforma</h2>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie"></x-metainfo-table>
                <form class="d-flex ml-auto" style="max-width: 500px;" action="{{route('admin.storeCategory')}}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="Crea una categoria">
                    <button type="submit" class="btn-modify text-white" style="background-color: forestgreen">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>
    
    
</x-layout>