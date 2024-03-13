<x-layout>
    <div class="container-fluid p-5 bg-transparent text-center text-white">
        <div class="row justify-content-center">
            <h1 class="glitch-font display-1">
                Tutti gli articoli per: {{ $query }}

                <h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-around flex-wrap">
            @foreach ($articles as $article)
                <x-card :article="$article" />
            @endforeach
        </div>
    </div>
</x-layout>
