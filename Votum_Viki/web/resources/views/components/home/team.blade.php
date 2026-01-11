@props(['team', 'image'])

<section class="bg-white py-12">
    <div class="container mx-auto px-4">
        <h2 class="h2 font-bold text-votum-blue mb-8 text-center">{{ $team->title ?? __('nav.ourTeam') }}</h2>

        <div class="max-w-3xl mx-auto">

            <div class="rounded-lg overflow-hidden shadow-lg mb-8">
                <img src="{{ asset('storage/'.$image->url) }}"
                     alt="{{ $image->alt }}"
                     class="w-full h-auto object-cover">
            </div>

            <div class="text-center">
                <a href="{{ route('about') }}"
                   class="bg-votum-blue text-white px-8 py-5 rounded-lg font-semibold txt-btn inline-flex items-center gap-3">
                    <i class="fas fa-users"></i>
                    <span>{{ __('nav.getToKnowTeam') }}</span>
                </a>
            </div>
        </div>
    </div>
</section>
