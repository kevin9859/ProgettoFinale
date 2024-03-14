<x-layout>
    <div class="container-fluid p-5 bg-transparent text-center text-white d-flex justify-content-center align-items-center">
        <h1 class="mt-4 glitch-font p-1" style="width:1000px; font-size:100px;">
            lista articoli
        </h1>
    </div>
    <div class="row" style="flex-direction: column; align-items: start; justify-content: start;">
        <div class="" style="flex-direction: column; align-items: start; justify-content: start;">
            @foreach ($articles as $article)
                <div class="col" style="flex-direction: column; align-items: start; justify-content: center;">
                    <x-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>