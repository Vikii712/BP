<section class="container mx-auto px-4 py-8 md:py-16" id="home">
    <div class="grid lg:grid-cols-2 gap-8 md:gap-12 items-center">
        <!-- Hero Content -->
        <div class="space-y-6 order-2 lg:order-1">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight">
                {{ __('Together we are stronger') }}
            </h2>
            <p class="text-lg md:text-xl text-gray-600">
                {{ __('Supporting people with disabilities to live full and independent lives') }}
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-3 md:gap-4">
                <a href="#about" class="inline-flex items-center px-4 md:px-6 py-2 md:py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors shadow-md text-sm md:text-base">
                    <i class="fas fa-info-circle mr-2"></i>
                    {{ __('More About Us') }}
                </a>
                <a href="#" class="inline-flex items-center px-4 md:px-6 py-2 md:py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md text-sm md:text-base" aria-label="{{ __('Visit our Facebook page') }}">
                    <i class="fab fa-facebook-f mr-2"></i>
                    Facebook
                </a>
                <a href="#" class="inline-flex items-center px-4 md:px-6 py-2 md:py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors shadow-md text-sm md:text-base" aria-label="{{ __('Visit our YouTube channel') }}">
                    <i class="fab fa-youtube mr-2"></i>
                    YouTube
                </a>
            </div>
        </div>

        <!-- Hero Image with Logo -->
        <div class="relative order-1 lg:order-2">
            <div class="aspect-video bg-gradient-to-br from-blue-200 to-purple-200 rounded-2xl shadow-xl overflow-hidden relative">
                <img
                    src="{{ asset('images/group.jpg') }}"
                    alt="{{ __('Group photo of VOTUM team members and participants') }}"
                    class="w-full h-full object-cover">

                <!-- Large Logo Overlay -->
                <div class="absolute bottom-4 right-4 w-20 h-20 md:w-24 md:h-24 bg-white rounded-full shadow-lg p-3 md:p-4 flex items-center justify-center">
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="{{ __('VOTUM logo') }}"
                        class="w-full h-full object-contain">
                </div>
            </div>
        </div>
    </div>
</section>
