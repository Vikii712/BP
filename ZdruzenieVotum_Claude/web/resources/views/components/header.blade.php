<header class="bg-votum-blue shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo and Name -->
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 flex items-center justify-center" role="img" aria-label="{{ __('VOTUM Logo') }}">
                    <img alt="{{ __('VOTUM organization logo') }}" src="{{ asset('images/logo.png') }}" width="80" class="object-contain">
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-white">VOTUM</h1>
            </div>

            <!-- Desktop Controls -->
            <div class="hidden lg:flex items-center space-x-4">
                @include('components.font-controls')
                @include('components.language-switcher')
            </div>

            <!-- Mobile Menu Button -->
            <button
                onclick="toggleMobileMenu()"
                class="lg:hidden p-2 rounded-lg hover:bg-blue-900 transition-colors"
                aria-label="{{ __('Toggle navigation menu') }}"
                aria-expanded="false"
                id="mobile-menu-button">
                <i class="fas fa-bars text-2xl text-white"></i>
            </button>
        </div>
    </div>

    <!-- Desktop Navigation -->
    <nav class="hidden lg:block border-t border-blue-900 bg-votum-blue" aria-label="{{ __('Main navigation') }}">
        <div class="container mx-auto px-4">
            @include('components.nav-menu')
        </div>
    </nav>

    <!-- Mobile Navigation Menu (Full Width Below Header) -->
    <div
        id="mobile-menu"
        class="mobile-menu lg:hidden bg-votum-blue border-t border-blue-900 overflow-y-auto">

        <div class="container mx-auto px-4 py-6">
            <!-- Mobile Controls -->
            <div class="space-y-4 mb-6 pb-6 border-b border-blue-800">
                <div class="bg-blue-900 rounded-lg p-4">
                    <p class="text-sm font-medium text-votum-accent-light mb-3">{{ __('Accessibility') }}</p>
                    @include('components.font-controls')
                </div>

                <div class="bg-blue-900 rounded-lg p-4">
                    <p class="text-sm font-medium text-votum-accent-light mb-3">{{ __('Language') }}</p>
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
