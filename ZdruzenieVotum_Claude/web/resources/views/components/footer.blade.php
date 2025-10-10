<footer class="bg-gray-800 text-white py-6 md:py-8">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-6 md:gap-8">
            <div>
                <h3 class="text-lg md:text-xl font-semibold mb-3 md:mb-4">VOTUM</h3>
                <p class="text-sm md:text-base text-gray-300">{{ __('Supporting people with disabilities') }}</p>
            </div>
            <div>
                <h4 class="text-base md:text-lg font-semibold mb-3 md:mb-4">{{ __('Contact') }}</h4>
                <p class="text-sm md:text-base text-gray-300">Email: info@votum.sk</p>
                <p class="text-sm md:text-base text-gray-300">{{ __('Phone') }}: +421 123 456 789</p>
            </div>
            <div>
                <h4 class="text-base md:text-lg font-semibold mb-3 md:mb-4">{{ __('Follow Us') }}</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-xl md:text-2xl hover:text-blue-400 transition-colors" aria-label="{{ __('Visit our Facebook page') }}">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-xl md:text-2xl hover:text-red-400 transition-colors" aria-label="{{ __('Visit our YouTube channel') }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="text-xl md:text-2xl hover:text-blue-300 transition-colors" aria-label="{{ __('Visit our Instagram page') }}">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-6 md:mt-8 pt-6 md:pt-8 text-center text-gray-400 text-sm md:text-base">
            <p>&copy; 2025 VOTUM. {{ __('All rights reserved') }}.</p>
        </div>
    </div>
</footer>
