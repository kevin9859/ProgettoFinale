<x-layout>
    <div class="container-fluid p-5 bg-transparent text-center text-white d-flex justify-content-center align-items-center">
        <h1 class="mt-4 titolo-glitch p-1" style="width:1000px; font-size:100px;">
            lista articoli
        </h1>
    </div>
    <div class="container my-3 mb-6">
        <div class="d-flex justify-content-around flex-wrap">
            @foreach ($articles as $article)
                <x-card :article="$article" />
            @endforeach
        </div>
    </div>
</x-layout>