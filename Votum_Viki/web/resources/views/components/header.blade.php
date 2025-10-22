<header class="fixed top-0 left-0 right-0 z-50 bg-blue-950 backdrop-blur-md pb-2">
    <div class="px-6 flex w-full items-center justify-between bg-[var(--blackblue)]">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img alt="logo" src="{{ asset('images/logo.png') }}" width="80">
            <h1 class="text-xl md:text-4xl font-semibold text-[var(--cream)] caveat">Združenie VOTUM</h1>
        </div>

        <!-- Right controls -->
        <div class="flex items-center gap-4">
            <!-- Font controls (desktop only) -->
            <div class="hidden md:flex items-center gap-2 bg-blue-900 rounded-full px-3 py-1">
                <button id="decrease-font" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold text-lg px-1">–</button>
                <span class="text-sm text-[var(--cream)]">aA</span>
                <button id="increase-font" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold text-lg px-1">+</button>
            </div>

            <!-- Language switch (desktop only) -->
            <form action="" method="post" class="hidden md:flex items-center gap-1 bg-blue-900 rounded-full px-3 py-1">
                @csrf
                <button type="submit" name="locale" value="sk"
                        class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                {{ session('locale','sk')==='sk' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
                    SK
                </button>
                <button type="submit" name="locale" value="en"
                        class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                {{ session('locale')==='en' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
                    EN
                </button>
            </form>

            <!-- Mobile toggle -->
            <button id="menu-toggle" aria-label="Toggle menu" class="md:hidden p-2 rounded-full text-[var(--cream)] hover:bg-blue-800 transition z-[60] relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Desktop nav -->
    <div class="mt-2 hidden md:block">
        <x-nav />
    </div>
</header>

<!-- Single full-screen mobile menu (one element only) -->
<div id="mobile-menu" class="fixed left-0 w-full bg-blue-950 text-[var(--cream)] hidden z-40 overflow-y-auto">
    <div class="flex flex-col items-center gap-8 px-6">

        <!-- Mobile font + locale controls (visible only on mobile) -->
        <div class="flex flex-row items-center gap-4 md:hidden">
            <div class="flex items-center gap-2 bg-blue-900 rounded-full px-3 py-1">
                <button id="decrease-font-mobile" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold text-lg px-1">–</button>
                <span class="text-sm text-[var(--cream)]">aA</span>
                <button id="increase-font-mobile" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold text-lg px-1">+</button>
            </div>

            <form action="" method="post" class="flex items-center gap-1 bg-blue-900 rounded-full px-3 py-1">
                @csrf
                <button type="submit" name="locale" value="sk" class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                {{ session('locale','sk')==='sk' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
                    SK
                </button>
                <button type="submit" name="locale" value="en" class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                {{ session('locale')==='en' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
                    EN
                </button>
            </form>
        </div>

        <!-- Links -->
        <ul class="flex flex-col gap-6 text-center font-medium w-full">
            <li><a href="#" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/domov.svg') }}" class="w-10 h-10" alt=""> Home</a></li>
            <li><a href="#about" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/Onas.svg') }}" class="w-10 h-10" alt=""> About us</a></li>
            <li><a href="#events" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/udalosti.svg') }}" class="w-10 h-10" alt=""> Events</a></li>
            <li><a href="#history" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/historia.svg') }}" class="w-10 h-10" alt=""> History</a></li>
            <li><a href="#support" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/podpora.svg') }}" class="w-10 h-10" alt=""> Support</a></li>
            <li><a href="#contacts" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/kontakty.svg') }}" class="w-10 h-10" alt=""> Contacts</a></li>
            <li><a href="#documents" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/dokumenty.svg') }}" class="w-10 h-10" alt=""> Documents</a></li>
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Font-size logic - robust + persistent
            const HTML = document.documentElement;
            const STORAGE_KEY = 'votum:font';
            const MIN = 0.8, MAX = 1.5, STEP = 0.1;

            function getSize() { return parseFloat(localStorage.getItem(STORAGE_KEY) || '1'); }
            function applySize() { HTML.style.fontSize = getSize() + 'rem'; }
            function setSize(newSize) {
                newSize = Math.round(newSize*100)/100;
                newSize = Math.min(Math.max(newSize, MIN), MAX);
                localStorage.setItem(STORAGE_KEY, String(newSize));
                applySize();
                // ensure menu position updates after font change
                adjustMenuPosition();
            }
            applySize();

            // Attach buttons if present (desktop + mobile)
            const inc = document.getElementById('increase-font');
            const dec = document.getElementById('decrease-font');
            const incM = document.getElementById('increase-font-mobile');
            const decM = document.getElementById('decrease-font-mobile');

            [inc, incM].forEach(btn => {
                if (btn) btn.addEventListener('click', (e) => { e.preventDefault(); setSize(getSize() + STEP); });
            });
            [dec, decM].forEach(btn => {
                if (btn) btn.addEventListener('click', (e) => { e.preventDefault(); setSize(getSize() - STEP); });
            });

            // Mobile menu toggle + position adjustment
            const toggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('mobile-menu');
            const header = document.querySelector('header');
            let open = false;

            // Make sure menu is attached to body (avoids z-index/transform problems)
            if (menu && menu.parentElement !== document.body) document.body.appendChild(menu);

            function adjustMenuPosition() {
                if (!menu) return;
                const headerHeight = header ? header.offsetHeight : 0;
                menu.style.top = headerHeight + 'px';
                menu.style.height = `calc(100vh - ${headerHeight}px)`;
            }
            adjustMenuPosition();
            window.addEventListener('resize', adjustMenuPosition);

            if (toggle && menu) {
                toggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    open = !open;
                    menu.classList.toggle('hidden', !open);
                    document.body.style.overflow = open ? 'hidden' : '';
                    if (open) adjustMenuPosition();
                });

                // close when clicking outside
                document.addEventListener('click', (e) => {
                    if (open && !menu.contains(e.target) && e.target !== toggle) {
                        open = false;
                        menu.classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });

                // close with Escape
                document.addEventListener('keydown', (e) => {
                    if (open && e.key === 'Escape') {
                        open = false;
                        menu.classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });
            }
        });
    </script>
@endpush
