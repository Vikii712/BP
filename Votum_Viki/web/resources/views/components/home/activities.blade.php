
<!-- Featured Activities Section -->
<section class="bg-votum-cream py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">Naše Aktivity</h2>

        <div class="grid md:grid-cols-2 gap-y-8 mb-5">
            @for($i = 0; $i < 2; $i++)
                <x-event.event_card :color='false' />
            @endfor
        </div>

        <div class="text-center">
            <button class="bg-votum-blue text-white px-8 py-5 rounded-lg hover-scale font-semibold text-lg">
                <i class="fas fa-arrow-right mr-2"></i>Chcete vidieť viac?
            </button>
        </div>
    </div>
</section>
