<footer class="bg-votum-blue text-white py-8 md:py-10 border-t-4 border-blue2">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Top Section: VOTUM Association with Social Links -->
        <div class="text-center mb-8 pb-6 border-b border-blue-800">
            <h3 class="text-xl md:text-2xl font-bold mb-3">{{ __('VOTUM Association') }}</h3>
            <div class="flex items-center justify-center space-x-4">
                <a href="#" class="w-10 h-10 bg-blue-900 rounded-full flex items-center justify-center hover:bg-blue2 transition-colors" aria-label="{{ __('Visit our Facebook page') }}">
                    <i class="fab fa-facebook-f text-lg"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-blue-900 rounded-full flex items-center justify-center hover:bg-votum-accent transition-colors" aria-label="{{ __('Visit our YouTube channel') }}">
                    <i class="fab fa-youtube text-lg"></i>
                </a>
            </div>
        </div>

        <!-- Bottom Section: Three Column Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6 items-start">
            <!-- Left Column: Home, About Us, Events, History -->
            <div class="text-center md:text-left">
                <a href="#home" class="text-gray-300 hover:text-white transition-colors text-sm flex items-center justify-center md:justify-start mb-2">
                    <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                    {{ __('Home') }}
                </a>
                <a href="#about" class="text-gray-300 hover:text-white transition-colors text-sm flex items-center justify-center md:justify-start mb-2">
                    <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                    {{ __('About Us') }}
                </a>
                <a href="#events" class="text-gray-300 hover:text-white transition-colors text-sm flex items-center justify-center md:justify-start mb-2">
                    <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                    {{ __('Events') }}
                </a>
                <a href="#history" class="text-gray-300 hover:text-white transition-colors text-sm flex items-center justify-center md:justify-start">
                    <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                    {{ __('History') }}
                </a>
            </div>

            <!-- Center Column: Support, Contact, Documents -->
            <div class="text-center">
                <a href="#support" class="text-gray-300 hover:text-white transition-colors text-sm flex items-center justify-center mb-2">
                    <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                    {{ __('Support') }}
                </a>
                <a href="#contact" class="text-gray-300 hover:text-white transition-colors text-sm flex items-center justify-center mb-2">
                    <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                    {{ __('Contact') }}
                </a>
                <a href="#documents" class="text-gray-300 hover:text-white transition-colors text-sm flex items-center justify-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                    {{ __('Documents') }}
                </a>
            </div>

            <!-- Right Column: Email + Accessibility Statement -->
            <div class="text-center md:text-right">
                <h4 class="text-base font-semibold mb-2 text-votum-accent-light">{{ __('Did you make a mistake?') }}</h4>
                <p class="text-gray-300 flex items-center justify-center md:justify-end text-sm mb-4">
                    <i class="fas fa-envelope text-blue2 mr-2"></i>
                    <a href="mailto:admin@zdruzenie.votum.sk" class="hover:text-white transition-colors">
                        admin@zdruzenie.votum.sk
                    </a>
                </p>
                <h4 class="text-base font-semibold mb-2 text-votum-accent-light">{{ __('Accessibility Statement') }}</h4>
                <a href="#accessibility" class="text-gray-300 hover:text-white transition-colors text-sm inline-flex items-center">
                    <i class="fas fa-universal-access text-blue2 mr-2"></i>
                    {{ __('View Statement') }}
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-blue-800 pt-4 text-center">
            <p class="text-gray-400 text-xs md:text-sm">
                &copy; 2025 VOTUM. {{ __('All rights reserved') }}.
            </p>
        </div>
    </div>
</footer>
