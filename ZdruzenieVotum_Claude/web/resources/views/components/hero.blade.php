<section class="container mx-auto px-4 py-8 md:py-16" id="home">
    <div class="grid lg:grid-cols-2 gap-8 md:gap-12 items-center">
        <!-- Hero Content -->
        <div class="space-y-6 relative">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-votum-blue leading-tight">
                {{ __('Together we are stronger') }}
            </h2>
            <p class="text-lg md:text-xl text-gray-700">
                {{ __('Supporting people with disabilities to live full and independent lives') }}
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-3 md:gap-4">
                <a href="#about" class="inline-flex items-center px-4 md:px-6 py-2 md:py-3 bg-votum-blue text-white rounded-lg hover:bg-blue-900 transition-colors shadow-md text-sm md:text-base">
                    <i class="fas fa-info-circle mr-2"></i>
                    {{ __('More About Us') }}
                </a>
                <a href="#" class="inline-flex items-center px-4 md:px-6 py-2 md:py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md text-sm md:text-base" aria-label="{{ __('Visit our Facebook page') }}">
                    <i class="fab fa-facebook-f mr-2"></i>
                    Facebook
                </a>
                <a href="#" class="inline-flex items-center px-4 md:px-6 py-2 md:py-3 bg-votum-accent text-white rounded-lg hover:bg-red-600 transition-colors shadow-md text-sm md:text-base" aria-label="{{ __('Visit our YouTube channel') }}">
                    <i class="fab fa-youtube mr-2"></i>
                    YouTube
                </a>
            </div>

            <!-- Large Logo Background - Desktop Only -->
            <div class="hidden lg:block absolute -right-32 top-1/3 -translate-y-1/2 w-64 h-64 opacity-5 pointer-events-none z-0">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt=""
                    class="w-full h-full object-contain">
            </div>
        </div>

        <!-- Hero Image -->
        <div class="relative">
            <div class="aspect-video bg-gradient-to-br from-blue-200 to-purple-200 rounded-2xl shadow-xl overflow-hidden">
                <img
                    src="{{ asset('images/group.jpg') }}"
                    alt="{{ __('Group photo of VOTUM team members and participants') }}"
                    class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>
