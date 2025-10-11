<footer class="bg-votum-blue text-white py-8 md:py-12 border-t-4 border-blue2">
    <div class="container mx-auto px-4">
        <!-- Top Section: VOTUM Association with Social Links -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 md:mb-12 pb-8 border-b border-blue-800">
            <div class="mb-6 md:mb-0">
                <h3 class="text-2xl md:text-3xl font-bold mb-2">{{ __('VOTUM Association') }}</h3>
                <div class="flex items-center space-x-4 mt-4">
                    <a href="#" class="w-10 h-10 bg-blue-900 rounded-full flex items-center justify-center hover:bg-blue2 transition-colors" aria-label="{{ __('Visit our Facebook page') }}">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-900 rounded-full flex items-center justify-center hover:bg-votum-accent transition-colors" aria-label="{{ __('Visit our YouTube channel') }}">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Section: Two Column Layout -->
        <div class="grid md:grid-cols-2 gap-8 md:gap-12">
            <!-- Left Column: Quick Links -->
            <div>
                <h4 class="text-lg md:text-xl font-semibold mb-4 text-votum-accent-light">{{ __('Quick Links') }}</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="#about" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                            {{ __('About Us') }}
                        </a>
                    </li>
                    <li>
                        <a href="#support" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                            {{ __('Support') }}
                        </a>
                    </li>
                    <li>
                        <a href="#events" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                            {{ __('Events') }}
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                            {{ __('Contact') }}
                        </a>
                    </li>
                    <li>
                        <a href="#history" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                            {{ __('History') }}
                        </a>
                    </li>
                    <li>
                        <a href="#documents" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-blue2"></i>
                            {{ __('Documents') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Right Column: Contact Information -->
            <div>
                <h4 class="text-lg md:text-xl font-semibold mb-4 text-votum-accent-light">{{ __('Did you make a mistake?') }}</h4>
                <div class="space-y-3 mb-6">
                    <p class="text-gray-300 flex items-start">
                        <i class="fas fa-envelope text-blue2 mt-1 mr-3"></i>
                        <a href="mailto:admin@zdruzenie.votum.sk" class="hover:text-white transition-colors">
                            admin@zdruzenie.votum.sk
                        </a>
                    </p>
                </div>

                <h4 class="text-lg md:text-xl font-semibold mb-4 mt-8 text-votum-accent-light">{{ __('Accessibility Statement') }}</h4>
                <a href="#accessibility" class="text-gray-300 hover:text-white transition-colors inline-flex items-center">
                    <i class="fas fa-universal-access text-blue2 mr-2"></i>
                    {{ __('View Accessibility Statement') }}
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-blue-800 mt-8 md:mt-12 pt-6 text-center">
            <p class="text-gray-400 text-sm md:text-base">
                &copy; 2025 VOTUM. {{ __('All rights reserved') }}.
            </p>
        </div>
    </div>
</footer>
