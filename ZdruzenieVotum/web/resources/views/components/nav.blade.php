<nav aria-label="Primary navigation" id="main-nav"
     class="relative z-40 ">

    <!-- Desktop nav -->
    <!-- Desktop nav -->
    <ul class="hidden md:flex justify-evenly text-blue-700">
        <li>
            <a href="{{ route('home') }}"
               class="flex flex-col items-center px-3 py-1 hover:text-blue-900 transition-colors {{ request()->routeIs('home') ? 'text-blue-900 font-semibold' : '' }}">
                <img src="{{ asset('images/domov.png') }}" alt="ikona domov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Home</span>
            </a>
        </li>
        <li>
            <a href="#about" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 transition-colors">
                <img src="{{ asset('images/Onas.png') }}" alt="ikona o nás" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">About us</span>
            </a>
        </li>
        <li>
            <a href="#events" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 transition-colors">
                <img src="{{ asset('images/udalosti.png') }}" alt="ikona udalosti" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Events</span>
            </a>
        </li>
        <li>
            <a href="#history" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 transition-colors">
                <img src="{{ asset('images/historia.png') }}" alt="ikona historie" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">History</span>
            </a>
        </li>
        <li>
            <a href="#support" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 transition-colors">
                <img src="{{ asset('images/podpora.png') }}" alt="ikona podpory" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Support</span>
            </a>
        </li>
        <li>
            <a href="#contacts" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 transition-colors">
                <img src="{{ asset('images/kontakty.png') }}" alt="ikona kontaktov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Contacts</span>
            </a>
        </li>
        <li>
            <a href="#documents" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 transition-colors">
                <img src="{{ asset('images/dokumenty.png') }}" alt="ikona dokumentov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Documents</span>
            </a>
        </li>
    </ul>


    <!-- Mobile toggle button -->
    <div class="md:hidden flex justify-end px-4 py-2 rounded-full">
        <button id="menu-toggle" aria-label="Toggle menu"
                class="p-2 rounded-full text-blue-700 hover:bg-blue-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile full-screen menu -->
    <div id="mobile-menu"
         class="hidden md:hidden fixed inset-x-0 bg-transparent z-30 overflow-y-auto"
         style="bottom: 0;">
        <ul class="flex flex-col gap-6 p-6 text-lg text-blue-800">
            <li>
                <a href="{{ route('home') }}" class="flex items-center gap-3 hover:text-blue-900 transition-colors">
                    <img src="{{ asset('images/domov.png') }}" alt="ikona domov" class="w-8 h-8 object-contain">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#about" class="flex items-center gap-3 hover:text-blue-900 transition-colors">
                    <img src="{{ asset('images/Onas.png') }}" alt="ikona o nás" class="w-8 h-8 object-contain">
                    <span>About us</span>
                </a>
            </li>
            <li>
                <a href="#events" class="flex items-center gap-3 hover:text-blue-900 transition-colors">
                    <img src="{{ asset('images/udalosti.png') }}" alt="ikona udalosti" class="w-8 h-8 object-contain">
                    <span>Events</span>
                </a>
            </li>
            <li>
                <a href="#history" class="flex items-center gap-3 hover:text-blue-900 transition-colors">
                    <img src="{{ asset('images/historia.png') }}" alt="ikona historie" class="w-8 h-8 object-contain">
                    <span>History</span>
                </a>
            </li>
            <li>
                <a href="#support" class="flex items-center gap-3 hover:text-blue-900 transition-colors">
                    <img src="{{ asset('images/podpora.png') }}" alt="ikona podpory" class="w-8 h-8 object-contain">
                    <span>Support</span>
                </a>
            </li>
            <li>
                <a href="#contacts" class="flex items-center gap-3 hover:text-blue-900 transition-colors">
                    <img src="{{ asset('images/kontakty.png') }}" alt="ikona kontaktov" class="w-8 h-8 object-contain">
                    <span>Contacts</span>
                </a>
            </li>
            <li>
                <a href="#documents" class="flex items-center gap-3 hover:text-blue-900 transition-colors">
                    <img src="{{ asset('images/dokumenty.png') }}" alt="ikona dokumentov" class="w-8 h-8 object-contain">
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
            const header = document.querySelector("header");

            function adjustMenuPosition() {
                const headerHeight = header.offsetHeight;
                mobileMenu.style.top = headerHeight + "px";
            }

            adjustMenuPosition();
            window.addEventListener("resize", adjustMenuPosition);

            const observer = new MutationObserver(adjustMenuPosition);
            observer.observe(document.documentElement, { attributes: true, attributeFilter: ["style"] });

            toggleBtn.addEventListener("click", () => {
                mobileMenu.classList.toggle("hidden");
                adjustMenuPosition();
            });
        });
    </script>
@endpush
