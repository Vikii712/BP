@php
   $text = "Našim želaním je vytvárať spoločenstvo ľudí, ktorí si navzájom pomáhajú, podporujú sa       a prinášajú si do života radosť. Sľubujeme, že sa o to budeme snažiť najlepšie, ako vieme. \n

Naša činnosť vychádza z kresťanských hodnôt – z úcty k Bohu, človeku a prostrediu, v ktorom žijeme. \n
Veríme, že každý z nás je jedinečný, má svoje miesto, talenty a hodnotu. Spoločne sa učíme prijímať sa navzájom, rozvíjať svoje schopnosti a tvoriť komunitu, kde sa každý cíti vítaný.  \n

Nič nepreverí Váš zámer lepšie ako čas...\n
Už viac ako 30 rokov sa snažíme prinášať do života porozumenie, rešpekt a lásku – jednoducho to, čo robí život krajším.  \n

"
@endphp

@for($i = 0; $i < 3; $i++)
    <div class="full-width mb-16">
        <div class="mb-8">
            <div class="grid md:grid-cols-2">
                <div class="relative {{ $i % 2 == 1 ? 'md:order-2' : 'md:order-1' }}">
                    <x-listen text="{{$text}}" id="{{$i}}"/>

                    <h2 class="h2 font-extrabold text-votum-blue mb-4">VOTUM – z latinského „želanie, sľub”</h2>
                    <p class="text-gray-700 leading-relaxed txt">
                        {{$text}}
                    </p>
                </div>

                <div class="bg-gradient-to-br flex items-center justify-center p-8 {{ $i % 2 == 1 ? 'md:order-1' : 'md:order-2' }}">
                    <img src="{{ asset('images/us.svg') }}" alt="Naša vízia" class="">
                </div>
            </div>
        </div>
    </div>
@endfor
