<nav aria-label="Primary navigation" id="main-nav" class="relative z-40 bg-blue-950">
    <!-- Desktop nav -->
    <ul class="hidden md:flex justify-evenly text-[var(--cream)]">
        <li><a href="{{ route('home') }}" class="flex flex-col items-center px-3 py-1 hover:text-blue-300">
                <img src="{{ asset('images/domov.svg') }}" alt="ikona domov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Home</span></a></li>

        <li><a href="#about" class="flex flex-col items-center px-3 py-1 hover:text-blue-300">
                <img src="{{ asset('images/Onas.svg') }}" alt="ikona o nás" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">About us</span></a></li>

        <li><a href="#events" class="flex flex-col items-center px-3 py-1 hover:text-blue-300">
                <img src="{{ asset('images/udalosti.svg') }}" alt="ikona udalosti" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Events</span></a></li>

        <li><a href="#history" class="flex flex-col items-center px-3 py-1 hover:text-blue-300">
                <img src="{{ asset('images/historia.svg') }}" alt="ikona historie" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">History</span></a></li>

        <li><a href="#support" class="flex flex-col items-center px-3 py-1 hover:text-blue-300">
                <img src="{{ asset('images/podpora.svg') }}" alt="ikona podpory" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Support</span></a></li>

        <li><a href="#contacts" class="flex flex-col items-center px-3 py-1 hover:text-blue-300">
                <img src="{{ asset('images/kontakty.svg') }}" alt="ikona kontaktov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Contacts</span></a></li>

        <li><a href="#documents" class="flex flex-col items-center px-3 py-1 hover:text-blue-300">
                <img src="{{ asset('images/dokumenty.svg') }}" alt="ikona dokumentov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Documents</span></a></li>
    </ul>

    <!-- Full-screen offcanvas mobile menu -->
    <div id="mobile-menu"
         class="fixed left-0 w-full bg-blue-950 text-[var(--cream)] hidden z-[100] overflow-y-auto">

            <ul class="flex flex-col gap-6 text-center font-medium w-full">
                <li><a href="{{ route('home') }}" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/domov.svg') }}" class="w-10 h-10" alt=""> Home</a></li>
                <li><a href="#about" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/Onas.svg') }}" class="w-10 h-10" alt=""> About us</a></li>
                <li><a href="#events" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/udalosti.svg') }}" class="w-10 h-10" alt=""> Events</a></li>
                <li><a href="#history" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/historia.svg') }}" class="w-10 h-10" alt=""> History</a></li>
                <li><a href="#support" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/podpora.svg') }}" class="w-10 h-10" alt=""> Support</a></li>
                <li><a href="#contacts" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/kontakty.svg') }}" class="w-10 h-10" alt=""> Contacts</a></li>
                <li><a href="#documents" class="flex justify-center items-center gap-3 hover:text-blue-300">
                        <img src="{{ asset('images/dokumenty.svg') }}" class="w-10 h-10" alt=""> Documents</a></li>
            </ul>
        </div>
    </div>
</nav>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggleBtn = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("mobile-menu");
            const header = document.querySelector("header");
            let open = false;

            // Move menu outside stacking context if not already
            if (mobileMenu.parentElement !== document.body) {
                document.body.appendChild(mobileMenu);
            }

            // Adjust mobile menu position & height dynamically
            function adjustMenu() {
                const headerHeight = header ? header.offsetHeight : 0;
                mobileMenu.style.top = headerHeight + "px";
                mobileMenu.style.height = `calc(100vh - ${headerHeight}px)`;
            }

            adjustMenu();
            window.addEventListener("resize", adjustMenu);

            function toggleMenu() {
                open = !open;
                if (open) {
                    adjustMenu();
                    mobileMenu.classList.remove("hidden");
                    document.body.style.overflow = "hidden";
                } else {
                    mobileMenu.classList.add("hidden");
                    document.body.style.overflow = "";
                }
            }

            toggleBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                toggleMenu();
            });

            document.addEventListener("click", (e) => {
                if (open && !mobileMenu.contains(e.target) && e.target !== toggleBtn) toggleMenu();
            });

            document.addEventListener("keydown", (e) => {
                if (open && e.key === "Escape") toggleMenu();
            });
        });
    </script>
@endpush
