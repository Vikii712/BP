<nav aria-label="Primary navigation" class="bg-white border-t shadow-sm">
    <!-- Desktop nav -->
    <ul class="hidden md:flex justify-evenly py-2 text-slate-600">
        <li>
            <a href="{{ route('home') }}"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-medium' : '' }}">
                <img src="{{ asset('images/domov.png') }}" alt="ikona domov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Home</span>
            </a>
        </li>
        <li>
            <a href="#about" class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/Onas.png') }}" alt="ikona o nás" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">About us</span>
            </a>
        </li>
        <li>
            <a href="#events" class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/udalosti.png') }}" alt="ikona udalosti" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Events</span>
            </a>
        </li>
        <li>
            <a href="#history" class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/historia.png') }}" alt="ikona historie" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">History</span>
            </a>
        </li>
        <li>
            <a href="#support" class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/podpora.png') }}" alt="ikona podpory" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Support</span>
            </a>
        </li>
        <li>
            <a href="#contacts" class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/kontakty.png') }}" alt="ikona kontaktov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Contacts</span>
            </a>
        </li>
        <li>
            <a href="#documents" class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/dokumenty.png') }}" alt="ikona dokumentov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Documents</span>
            </a>
        </li>
    </ul>

    <!-- Mobile toggle button -->
    <div class="md:hidden flex justify-end px-4 py-2">
        <button id="menu-toggle" aria-label="Toggle menu"
                class="p-2 rounded-md border border-gray-300 hover:bg-gray-100">
            <!-- Always show hamburger -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile full-screen menu -->
    <div id="mobile-menu" class="hidden md:hidden fixed inset-x-0 top-[60px] bottom-0 bg-white z-30">
        <ul class="flex flex-col justify-evenly items-center h-full text-lg text-slate-700">
            <li>
                <a href="{{ route('home') }}" class="flex flex-col items-center hover:text-blue-600 transition-colors">
                    <img src="{{ asset('images/domov.png') }}" alt="ikona domov" class="w-10 h-10 mb-2 object-contain">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#about" class="flex flex-col items-center hover:text-blue-600 transition-colors">
                    <img src="{{ asset('images/Onas.png') }}" alt="ikona o nás" class="w-10 h-10 mb-2 object-contain">
                    <span>About us</span>
                </a>
            </li>
            <li>
                <a href="#events" class="flex flex-col items-center hover:text-blue-600 transition-colors">
                    <img src="{{ asset('images/udalosti.png') }}" alt="ikona udalosti" class="w-10 h-10 mb-2 object-contain">
                    <span>Events</span>
                </a>
            </li>
            <li>
                <a href="#history" class="flex flex-col items-center hover:text-blue-600 transition-colors">
                    <img src="{{ asset('images/historia.png') }}" alt="ikona historie" class="w-10 h-10 mb-2 object-contain">
                    <span>History</span>
                </a>
            </li>
            <li>
                <a href="#support" class="flex flex-col items-center hover:text-blue-600 transition-colors">
                    <img src="{{ asset('images/podpora.png') }}" alt="ikona podpory" class="w-10 h-10 mb-2 object-contain">
                    <span>Support</span>
                </a>
            </li>
            <li>
                <a href="#contacts" class="flex flex-col items-center hover:text-blue-600 transition-colors">
                    <img src="{{ asset('images/kontakty.png') }}" alt="ikona kontaktov" class="w-10 h-10 mb-2 object-contain">
                    <span>Contacts</span>
                </a>
            </li>
            <li>
                <a href="#documents" class="flex flex-col items-center hover:text-blue-600 transition-colors">
                    <img src="{{ asset('images/dokumenty.png') }}" alt="ikona dokumentov" class="w-10 h-10 mb-2 object-contain">
                    <span>Documents</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggleBtn = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("mobile-menu");

            toggleBtn.addEventListener("click", () => {
                mobileMenu.classList.toggle("hidden");
            });
        });
    </script>
@endpush
