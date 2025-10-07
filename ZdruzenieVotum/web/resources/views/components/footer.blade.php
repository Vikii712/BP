<footer class="bg-blue-950 text-[var(--cream)] py-10 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

        <!-- Left column -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left gap-3">
            <h4 class="text-xl font-semibold">Association <span class="text-blue-300">VOTUM</span></h4>
            <div class="flex items-center gap-3 mt-2">
                <a href="https://facebook.com" target="_blank" aria-label="Facebook"
                   class="p-2 bg-blue-900 rounded-full hover:bg-blue-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22 12a10 10 0 1 0-11.5 9.9v-7H8v-3h2.5V9.5A3.5 3.5 0 0 1 14.4 6h2.6v3h-2.3a1 1 0 0 0-1.1 1.1V12H17l-.5 3h-2.4v7A10 10 0 0 0 22 12z" />
                    </svg>
                </a>
                <a href="https://youtube.com" target="_blank" aria-label="YouTube"
                   class="p-2 bg-blue-900 rounded-full hover:bg-blue-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19.6 3.3H4.4A3.4 3.4 0 0 0 1 6.7v10.6a3.4 3.4 0 0 0 3.4 3.4h15.2a3.4 3.4 0 0 0 3.4-3.4V6.7a3.4 3.4 0 0 0-3.4-3.4zM10 15V9l6 3-6 3z" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Middle navigation -->
        <div class="grid grid-cols-2 gap-x-10 text-center md:text-left">
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-blue-300 transition">Home</a></li>
                <li><a href="#about" class="hover:text-blue-300 transition">About us</a></li>
                <li><a href="#events" class="hover:text-blue-300 transition">Events</a></li>
                <li><a href="#history" class="hover:text-blue-300 transition">History</a></li>
            </ul>
            <ul class="space-y-2">
                <li><a href="#support" class="hover:text-blue-300 transition">Support</a></li>
                <li><a href="#contacts" class="hover:text-blue-300 transition">Contacts</a></li>
                <li><a href="#documents" class="hover:text-blue-300 transition">Documents</a></li>
            </ul>
        </div>

        <!-- Right column -->
        <div class="flex flex-col items-center md:items-end text-center md:text-right gap-3">
            <p class="text-sm">Found a mistake?</p>
            <a href="mailto:admin@zdruzenievotum.sk" class="text-blue-300 hover:underline">
                admin@zdruzenievotum.sk
            </a>
            <a href="#" class="text-sm hover:underline">Accessibility statement</a>
        </div>
    </div>

    <!-- Bottom bar -->
    <div class="mt-10 border-t border-blue-900 pt-4 text-center text-sm text-blue-300">
        © {{ date('Y') }} VOTUM. All rights reserved.
    </div>
</footer>
