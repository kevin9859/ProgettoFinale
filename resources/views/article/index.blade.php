<x-layout>
    <div class="container-fluid p-5">
        <div class="row justify-content-center">
            <div class="col-md-4 bg-">
                <div class="p-6 text-center text-white">
                    <h1 class="display-1">
                        Lista Articoli
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3 mb-6">

        <div class="d-flex justify-content-around flex-wrap">
            @foreach ($articles as $article)
                <x-card :article="$article" />
            @endforeach
        </div>
    </div>
</x-layout>
