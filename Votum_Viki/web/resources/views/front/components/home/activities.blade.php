@php
    $locale = app()->getLocale();
@endphp
@props(['events'])


<!-- Featured Activities Section -->
<section class=" py-12">
    <div class="container mx-auto sm:px-4">

        <h2 class="h2 sentence font-bold text-votum-blue text-center mb-8">
            {{ __('nav.activities') }}
        </h2>

        <div class="grid lg:grid-cols-2 gap-y-8 mb-5">
            @foreach($events as $event)
                <x-front::event.event_card :color='false' :event="$event" :locale="$locale"/>
            @endforeach
        </div>

        <div class="text-center p-2">
            <a href="{{ route('events', ['locale' => $locale]) }}" class="bg-votum-blue text-white rounded-lg  font-semibold txt-btn">
                {{ __('nav.seeMore') }}
                <i class="fas fa-arrow-right mr-2"></i>
            </a>
        </div>
    </div>
</section>

