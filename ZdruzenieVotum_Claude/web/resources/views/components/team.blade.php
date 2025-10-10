<section class="bg-white py-8 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-votum-blue mb-8 md:mb-12">{{ __('Our Team') }}</h2>

        <div class="max-w-4xl mx-auto mb-6 md:mb-8">
            <div class="aspect-video rounded-2xl shadow-xl overflow-hidden border-4 border-votum-blue">
                <img
                    src="{{ asset('images/team.jpg') }}"
                    alt="{{ __('VOTUM team photo showing dedicated staff and volunteers') }}"
                    class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-700 mt-4 text-sm md:text-base font-medium">{{ __('Together we make a difference') }}</p>
        </div>

        <div class="text-center">
            <a href="#about" class="inline-flex items-center px-6 md:px-8 py-2 md:py-3 bg-votum-blue text-white rounded-lg hover:bg-blue-900 transition-colors shadow-md text-base md:text-lg font-medium">
                <i class="fas fa-users mr-2"></i>
                {{ __('Learn More About Our Team') }}
            </a>
        </div>
    </div>
</section>
