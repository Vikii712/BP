<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo and Name -->
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 flex items-center justify-center" role="img" aria-label="{{ __('VOTUM Logo') }}">
                    <img alt="{{ __('VOTUM organization logo') }}" src="{{ asset('images/logo.png') }}" width="80" class="object-contain">
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-blue-600">VOTUM</h1>
            </div>

            <!-- Desktop Controls -->
            <div class="hidden lg:flex items-center space-x-4">
                @include('components.font-controls')
                @include('components.language-switcher')
            </div>

            <!-- Mobile Menu Button -->
            <button
                onclick="toggleMobileMenu()"
                class="lg:hidden p-2 rounded-lg hover:bg-blue-50 transition-colors"
                aria-label="{{ __('Toggle navigation menu') }}"
                aria-expanded="false"
                id="mobile-menu-button">
                <i class="fas fa-bars text-2xl text-gray-700"></i>
            </button>
        </div>
    </div>

    <!-- Desktop Navigation -->
    <nav class="hidden lg:block border-t border-gray-200 bg-white" aria-label="{{ __('Main navigation') }}">
        <div class="container mx-auto px-4">
            @include('components.nav-menu')
        </div>
    </nav>

    <!-- Mobile Navigation Overlay -->
    <div
        id="mobile-menu-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"
        onclick="toggleMobileMenu()">
    </div>

    <!-- Mobile Navigation Menu -->
    <div
        id="mobile-menu"
        class="mobile-menu hidden fixed top-0 right-0 h-full w-80 max-w-full bg-white shadow-2xl z-50 overflow-y-auto">

        <div class="p-6">
            <!-- Close Button -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">{{ __('Menu') }}</h2>
                <button
                    onclick="toggleMobileMenu()"
                    class="p-2 rounded-lg hover:bg-gray-100 transition-colors"
                    aria-label="{{ __('Close menu') }}">
                    <i class="fas fa-times text-2xl text-gray-700"></i>
                </button>
            </div>

            <!-- Mobile Controls -->
            <div class="space-y-4 mb-6 pb-6 border-b border-gray-200">
                <div class="bg-blue-50 rounded-lg p-4">
                    <p class="text-sm font-medium text-gray-700 mb-3">{{ __('Accessibility') }}</p>
                    @include('components.font-controls')
                </div>

                <div class="bg-blue-50 rounded-lg p-4">
                    <p class="text-sm font-medium text-gray-700 mb-3">{{ __('Language') }}</p>
                    @include('components.language-switcher')
                </div>
            </div>

            <!-- Mobile Navigation Links -->
            <nav aria-label="{{ __('Mobile navigation') }}">
                @include('components.nav-menu', ['mobile' => true])
            </nav>
        </div>
    </div>
</header>
