<x-layout>
    <div class="container-fluid p-5 text-center text-white">
        <div class="d-flex flex-column align-items-center">
            <h2 class="font-bold mb-3" style="font-size:70px;">
                Benvenuto Redattore
            </h2>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-success text-center">
        {{session('message')}}
    </div>
    @endif

    <div class="container-2 my-5">
        <div class="d-flex flex-column align-items-center">
            <div class="col-12">
                <h2 class="dashboard-h2">Articoli in fase di revisione</h2>
                <x-writer-article-table :articles="$unrevisionedArticles"></x-writer-article-table>
            </div>
        </div>
    </div>
    <div class="container-2 my-5">
        <div class="d-flex flex-column align-items-center">
            <div class="col-12">
                <h2 class="netflix-text">Articoli pubblicati</h2>
                <x-writer-article-table :articles="$acceptedArticles"></x-writer-article-table>
            </div>
        </div>
    </div>
    <div class="container-2 my-5">
        <div class="d-flex flex-column align-items-center">
            <div class="col-12">
                <h2 class="netflix-text">Articoli respinti</h2>
                <x-writer-article-table :articles="$rejectedArticles"></x-writer-article-table>
            </div>
        </div>
    </div>
</x-layout>