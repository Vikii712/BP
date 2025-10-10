<section class="container mx-auto px-4 py-8 md:py-16">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-votum-blue mb-8 md:mb-12">{{ __('Our Activities') }}</h2>

    <div class="grid md:grid-cols-2 gap-6 md:gap-8 mb-6 md:mb-8">
        <!-- Activity Card 1 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow border-2 border-votum-blue">
            <div class="aspect-video overflow-hidden">
                <img
                    src="{{ asset('images/activity1.jpg') }}"
                    alt="{{ __('Photos from Summer Camp 2024 showing participants enjoying outdoor activities') }}"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4 md:p-6 bg-votum-cream">
                <h3 class="text-lg md:text-xl font-semibold text-votum-blue mb-2">{{ __('Summer Camp 2024') }}</h3>
                <p class="text-sm md:text-base text-gray-700 mb-4">{{ __('Unforgettable experiences and new friendships') }}</p>
                <a href="#" class="inline-flex items-center text-votum-accent hover:text-red-700 font-medium text-sm md:text-base">
                    {{ __('More') }}
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Activity Card 2 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow border-2 border-votum-blue">
            <div class="aspect-video overflow-hidden">
                <img
                    src="{{ asset('images/activity2.jpg') }}"
                    alt="{{ __('Concert 2025 promotional image') }}"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4 md:p-6 bg-votum-cream">
                <h3 class="text-lg md:text-xl font-semibold text-votum-blue mb-2">{{ __('Concert 2025') }}</h3>
                <p class="text-sm md:text-base text-gray-700 mb-4">{{ __('Annual charity concert') }}</p>
                <a href="#" class="inline-flex items-center text-votum-accent hover:text-red-700 font-medium text-sm md:text-base">
                    {{ __('More') }}
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="#events" class="inline-flex items-center px-6 md:px-8 py-2 md:py-3 bg-votum-blue text-white rounded-lg hover:bg-blue-900 transition-colors shadow-md text-base md:text-lg font-medium">
            {{ __('See More Events') }}
            <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</section>
