<nav aria-label="Primary navigation" class="bg-white border-t shadow-sm">
    <ul class="flex justify-evenly py-2 text-slate-600">
        <li>
            <a href="{{ route('home') }}"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-medium' : '' }}">
                <img src="{{ asset('images/domov.png') }}" alt="ikona domov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Home</span>
            </a>
        </li>

        <li>
            <a href="#about"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/Onas.png') }}" alt="ikona o nás" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">About us</span>
            </a>
        </li>

        <li>
            <a href="#events"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/udalosti.png') }}" alt="ikona udalosti" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Events</span>
            </a>
        </li>

        <li>
            <a href="#history"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/historia.png') }}" alt="ikona historie" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">History</span>
            </a>
        </li>

        <li>
            <a href="#support"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/podpora.png') }}" alt="ikona podpory" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Support</span>
            </a>
        </li>

        <li>
            <a href="#contacts"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/kontakty.png') }}" alt="ikona kontaktov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Contacts</span>
            </a>
        </li>

        <li>
            <a href="#documents"
               class="flex flex-col items-center px-2 py-1 hover:text-blue-600 transition-colors">
                <img src="{{ asset('images/dokumenty.png') }}" alt="ikona dokumentov" class="w-7 h-7 mb-1 object-contain">
                <span class="text-xs">Documents</span>
            </a>
        </li>
    </ul>
</nav>
