<nav aria-label="Primary navigation" id="main-nav" class="relative z-40 bg-blue-950">
    <!-- Desktop nav -->
    <ul class="hidden md:flex justify-evenly text-[var(--cream)]">
        <li><a href="#" class="flex flex-col items-center px-3 hover:text-blue-300">
                <img src="{{ asset('images/domov.svg') }}" alt="ikona domov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Home</span></a></li>

        <li><a href="#" class="flex flex-col items-center px-3 hover:text-blue-300">
                <img src="{{ asset('images/Onas.svg') }}" alt="ikona o nás" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">About us</span></a></li>

        <li><a href="#" class="flex flex-col items-center px-3 hover:text-blue-300">
                <img src="{{ asset('images/udalosti.svg') }}" alt="ikona udalosti" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Events</span></a></li>

        <li><a href="#"  class="flex flex-col items-center px-3 hover:text-blue-300">
                <img src="{{ asset('images/historia.svg') }}" alt="ikona historie" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">History</span></a></li>

        <li><a href="#"  class="flex flex-col items-center px-3 hover:text-blue-300">
                <img src="{{ asset('images/podpora.svg') }}" alt="ikona podpory" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Support</span></a></li>

        <li><a href="#" class="flex flex-col items-center px-3 hover:text-blue-300">
                <img src="{{ asset('images/kontakty.svg') }}" alt="ikona kontaktov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Contacts</span></a></li>

        <li><a href="#" class="flex flex-col items-center px-3 hover:text-blue-300">
                <img src="{{ asset('images/dokumenty.svg') }}" alt="ikona dokumentov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-sm md:text-base font-bold">Documents</span></a></li>
    </ul>
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
