@for($i = 0; $i < 3; $i++)
    <div class="full-width mb-16">
        <div class="mb-8 overflow-hidden">
            <div class="grid md:grid-cols-2">
                <div class="p-8 {{ $i % 2 == 1 ? 'md:order-2' : 'md:order-1' }}">
                    <h3 class="text-3xl font-extrabold text-votum-blue mb-4">Naša Vízia</h3>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        Vytvárame spoločnosť, kde každý človek, bez ohľadu na zdravotné znevýhodnenie, má možnosť žiť plnohodnotný, nezávislý a zmysluplný život. Veríme v svet, kde sú všetky bariéry odstránené a inklúzia je prirodzenou súčasťou každodenného života. Naša vízia zahŕňa spoločnosť, ktorá oceňuje rozmanitosť a poskytuje rovnaké príležitosti všetkým svojim členom.
                    </p>
                </div>

                <div class="bg-gradient-to-br flex items-center justify-center p-8 {{ $i % 2 == 1 ? 'md:order-1' : 'md:order-2' }}">
                    <img src="{{ asset('images/us.svg') }}" alt="Naša vízia" class="pl-10">
                </div>
            </div>
        </div>
    </div>
@endfor
