<nav aria-label="Primary navigation" id="main-nav"
     class="relative z-40 ">

    <!-- Desktop nav -->
    <!-- Desktop nav -->
    <ul class="hidden md:flex justify-evenly text-[var(--cream)]">
        <li>
            <a href="{{ route('home') }}"
               class="flex flex-col items-center px-3 py-1 hover:text-blue-900 ">
                <img src="{{ asset('images/domov.svg') }}" alt="ikona domov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold ">Home</span>
            </a>
        </li>
        <li>
            <a href="#about" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 ">
                <img src="{{ asset('images/Onas.svg') }}" alt="ikona o nás" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold ">About us</span>
            </a>
        </li>
        <li>
            <a href="#events" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 ">
                <img src="{{ asset('images/udalosti.svg') }}" alt="ikona udalosti" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold ">Events</span>
            </a>
        </li>
        <li>
            <a href="#history" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 ">
                <img src="{{ asset('images/historia.svg') }}" alt="ikona historie" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold ">History</span>
            </a>
        </li>
        <li>
            <a href="#support" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 ">
                <img src="{{ asset('images/podpora.svg') }}" alt="ikona podpory" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold ">Support</span>
            </a>
        </li>
        <li>
            <a href="#contacts" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 ">
                <img src="{{ asset('images/kontakty.svg') }}" alt="ikona kontaktov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold ">Contacts</span>
            </a>
        </li>
        <li>
            <a href="#documents" class="flex flex-col items-center px-3 py-1 hover:text-blue-900 ">
                <img src="{{ asset('images/dokumenty.svg') }}" alt="ikona dokumentov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold ">Documents</span>
            </a>
        </li>
    </ul>


    <!-- Mobile toggle button -->
    <div class="md:hidden flex justify-end px-4 py-2 rounded-full">
        <button id="menu-toggle" aria-label="Toggle menu"
                class="p-2 rounded-full text-[var(--cream)] hover:bg-blue-800 transition">
            <!-- Menu icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Full-screen offcanvas mobile menu -->
    <div id="mobile-menu"
         class="bg-blue-950 text-[var(--cream)] fixed left-0 right-0 z-40 overflow-y-auto hidden">

        <div class="p-8 pt-20 flex flex-col items-center gap-6">
            <ul class="flex flex-col gap-6 text-center w-full">
                <li><a href="{{ route('home') }}" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/domov.png') }}" class="w-6 h-6" alt=""> Home</a></li>
                <li><a href="#about" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/Onas.png') }}" class="w-6 h-6" alt=""> About us</a></li>
                <li><a href="#events" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/udalosti.png') }}" class="w-6 h-6" alt=""> Events</a></li>
                <li><a href="#history" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/historia.png') }}" class="w-6 h-6" alt=""> History</a></li>
                <li><a href="#support" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/podpora.png') }}" class="w-6 h-6" alt=""> Support</a></li>
                <li><a href="#contacts" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/kontakty.png') }}" class="w-6 h-6" alt=""> Contacts</a></li>
                <li><a href="#documents" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/dokumenty.png') }}" class="w-6 h-6" alt=""> Documents</a></li>
            </ul>
        </div>
    </div>

</nav>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggleBtn = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("mobile-menu");
            const closeBtn = document.getElementById("menu-close");
            const header = document.querySelector("header");

            if (!toggleBtn || !mobileMenu) return;

            // Move menu outside transformed header to make fixed positioning work
            if (mobileMenu.parentElement !== document.body) {
                document.body.appendChild(mobileMenu);
            }

            function adjustMenuSize() {
                const h = header ? header.offsetHeight : 0;
                mobileMenu.style.top = h + "px";
                mobileMenu.style.height = `calc(100vh - ${h}px)`;
            }
            adjustMenuSize();
            window.addEventListener("resize", adjustMenuSize);

            let open = false;

            function showMenu() {
                adjustMenuSize();
                mobileMenu.classList.remove("hidden");
                document.body.style.overflow = "hidden";
                open = true;
            }

            function hideMenu() {
                mobileMenu.classList.add("hidden");
                document.body.style.overflow = "";
                open = false;
            }

            toggleBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                open ? hideMenu() : showMenu();
            });

            closeBtn?.addEventListener("click", hideMenu);
            document.addEventListener("click", (e) => {
                if (open && !mobileMenu.contains(e.target) && e.target !== toggleBtn) hideMenu();
            });
            document.addEventListener("keydown", (e) => {
                if (open && e.key === "Escape") hideMenu();
            });
        });
    </script>
@endpush
