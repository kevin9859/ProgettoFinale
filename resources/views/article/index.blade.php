<x-layout>
    <div class="container-fluid p-5 bg-transparent text-center text-white d-flex justify-content-center align-items-center">
        <h1 class="mt-4 glitch-font p-1" style="width:1000px; font-size:100px;">
            lista articoli
        </h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-sm-6 col-md-4 mb-4 d-flex justify-content-center">
                    <x-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>