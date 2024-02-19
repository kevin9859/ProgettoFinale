<x-layout>

    <div class="container-fluid p-5 bg-green text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Bentornato, Revisore
            </h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-success text-center">
        {{session('message')}}
    </div>
    @endif

    <div class="container-2 my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles"></x-articles-table>
            </div>
        </div>
    </div>
    <div class="container-2 my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli revisionati</h2>
                <x-articles-table :articles="$acceptedArticles"></x-articles-table>
            </div>
        </div>
    </div>
    <div class="container-2 my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli respinti</h2>
                <x-articles-table :articles="$rejectedArticles"></x-articles-table>
            </div>
        </div>
    </div>
    
</x-layout>