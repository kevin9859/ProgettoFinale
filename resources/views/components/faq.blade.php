<section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">
                Domande più frequenti
            </h2>
        </div>
        <div class="max-w-3xl mx-auto mt-8 space-y-4 md:mt-16">
            <div
                class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                <button type="button" id="question1" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                    <span class="flex text-lg font-semibold text-black">Quali tipi di articoli di giornali vengono trattati sul blog?</span>
                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="answer1" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                    <p>Trattiamo una vasta gamma di articoli giornalistici che coprono notizie nazionali e internazionali, politica, economia, scienza, cultura, e altro ancora.</p>
                </div>
            </div>
            <div
                class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                <button type="button" id="question2" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                    <span class="flex text-lg font-semibold text-black">Come scegliete gli articoli da includere nel vostro blog?</span>
                    <svg id="arrow2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="answer2" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                    <p>Gli articoli vengono selezionati in base alla loro rilevanza, interesse per i nostri lettori e qualità dell'informazione.</p>
                </div>
            </div>
            <div
                class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                <button type="button" id="question3" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                    <span class="flex text-lg font-semibold text-black">Che criteri seguite per garantire l'accuratezza delle informazioni riportate negli articoli?</span>
                    <svg id="arrow3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="answer3" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                    <p>Ci affidiamo a fonti giornalistiche autorevoli e verificate e, quando necessario, verifichiamo le informazioni attraverso più fonti.</p>
                </div>
            </div>
            <div
                class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                <button type="button" id="question4" data-state="closed" class="flex items-center justify-content-center w-full px-4 py-5 sm:p-6">
                    <span class="flex text-lg font-semibold text-black">Come ricevo le ultime notizie?</span>
                    <svg id="arrow4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="answer4" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                    <p>Semplice, abbonati alla nostra Newsletter!</p>
                </div>
            </div>
        </div>
        <p class="text-center text-gray-600 textbase mt-9">
           Hai ancora domande?
            <span class="cursor-pointer font-medium text-tertiary transition-all duration-200 hover:text-tertiary focus:text-tertiary hover-underline ml-2"style="font-size:22px;">Contattaci
            </span>
        </p>
    </div>
    <script>
        // JavaScript to toggle the answers and rotate the arrows
        document.querySelectorAll('[id^="question"]').forEach(function(button, index) {
            button.addEventListener('click', function() {
                var answer = document.getElementById('answer' + (index + 1));
                var arrow = document.getElementById('arrow' + (index + 1));

                if (answer.style.display === 'none' || answer.style.display === '') {
                    answer.style.display = 'block';
                    arrow.style.transform = 'rotate(0deg)';
                } else {
                    answer.style.display = 'none';
                    arrow.style.transform = 'rotate(-180deg)';
                }
            });
        });
    </script>

</div>
</section>