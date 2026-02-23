@props(['events'])


<!-- Featured Activities Section -->
<section class=" py-12">
    <div class="container mx-auto sm:px-4">

        <h2 class="h2 font-bold text-votum-blue text-center mb-8">
            {{ __('nav.activities') }}
        </h2>

        <div class="grid md:grid-cols-2 gap-y-8 mb-5">
            @foreach($events as $event)
                <x-event.event_card :color='false' :event="$event"/>
            @endforeach
        </div>

        <div class="text-center p-4">
            <button class="bg-votum-blue text-white px-8 py-5 rounded-lg  font-semibold txt-btn">
                {{ __('nav.seeMore') }}
                <i class="fas fa-arrow-right mr-2"></i>
            </button>
        </div>
    </div>
</section>

