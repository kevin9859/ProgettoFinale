<x-layout>
    <div class="container-fluid netflix-bg p-5 text-white">
        <div class="row justify-content-center">
            <h1 id="dashboard-title"class="display-1">
                Bentornato, Redattore
            </h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-success text-center">
        {{session('message')}}
    </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="dashboard-h2">Articoli in fase di revisione</h2>
                <x-writer-article-table :articles="$unrevisionedArticles"></x-writer-article-table>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="netflix-text">Articoli pubblicati</h2>
                <x-writer-article-table :articles="$acceptedArticles"></x-writer-article-table>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="netflix-text">Articoli respinti</h2>
                <x-writer-article-table :articles="$rejectedArticles"></x-writer-article-table>
            </div>
        </div>
    </div>
</x-layout>
