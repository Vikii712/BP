<x-wave />

<!-- Featured Activities Section -->
<section class="bg-blue-100 py-12">
    <div class="container mx-auto px-4">

        <div class="relative mb-8">
            <h2 class="h2 font-bold text-votum-blue text-center">
                Naše Aktivity
            </h2>

            <!-- Echo maskot napravo -->
            <div
                class="
                pointer-events-none select-none
                w-30 h-30 mx-auto
                relative
                sm:absolute sm:top-1/2 sm:-translate-y-1/2 sm:right-0
                sm:w-40 sm:h-40 sm:mt-0 sm:mx-0
            "
                    >
                <img src="{{ asset('images/votumaci.png') }}" alt=""
                     class="w-full h-full object-contain">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-y-8 mb-5">
            @for($i = 0; $i < 2; $i++)
                <x-event.event_card :color='false' />
            @endfor
        </div>

        <div class="text-center">
            <button class="bg-votum-blue text-white px-8 py-5 rounded-lg hover-scale font-semibold txt-btn">
                <i class="fas fa-arrow-right mr-2"></i>Chcete vidieť viac?
            </button>
        </div>
    </div>
</section>

<x-wave :inverted="true"/>
