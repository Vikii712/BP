<header class="fixed top-0 left-0 right-0 z-50 bg-blue-950 backdrop-blur-md pb-2">
    <div class=" sm:pr-6 flex w-full items-center justify-between bg-[var(--blackblue)]">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img class="p-2 pr-0 sm:pr-2" alt="logo" src="{{ asset('images/logo.svg') }}" width="70">
            <h1 class="text-3xl font-semibold text-[var(--cream)] caveat">Združenie VOTUM</h1>
        </div>

        <!-- Right controls -->
        <div class="flex items-center gap-4">
            <!-- Font controls (desktop only) -->
            <div class="hidden md:flex items-center gap-2 bg-blue-900 rounded-full">
                <button id="decrease-font" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold text-2xl px-5 py-2">–</button>
                <span class="text-lg text-[var(--cream)]">aA</span>
                <button id="increase-font" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold text-2xl px-5 py-2">+</button>
            </div>

            <!-- Language switch (desktop only) -->
            <div class="hidden md:block">
                <x-locale-switch />
            </div>

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
    <div class="flex flex-col items-center gap-8 px-6 pt-5">

        <!-- Mobile font + locale controls (visible only on mobile) -->
        <div class="flex flex-row items-center gap-4 md:hidden ">
            <div class="flex items-center gap-2 bg-blue-900 rounded-full text-2xl">
                <button id="decrease-font-mobile" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold px-5 py-3">–</button>
                <span class="text-lg text-[var(--cream)]">aA</span>
                <button id="increase-font-mobile" type="button" class="text-[var(--cream)] hover:text-blue-300 font-bold px-5 py-3">+</button>
            </div>

            <x-locale-switch mobile />
        </div>

        <!-- Links -->
        <ul class="flex flex-col gap-6 text-center font-medium w-full">
            <li><a href="{{route('main')}}" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/domov.svg') }}" class="w-10 h-10" alt=""> {{ __('nav.home')}}</a></li>
            <li><a href="{{route('about')}}" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/Onas.svg') }}" class="w-10 h-10" alt=""> {{ __('nav.about')}}</a></li>
            <li><a href="{{route('events')}}"  class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/udalosti.svg') }}" class="w-10 h-10" alt="">{{ __('nav.events')}}</a></li>
            <li><a href="{{route('history')}}" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/historia.svg') }}" class="w-10 h-10" alt="">{{ __('nav.history')}}</a></li>
            <li><a href="{{route('support')}}" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/podpora.svg') }}" class="w-10 h-10" alt="">{{ __('nav.support')}}</a></li>
            <li><a href="{{route('contacts')}}" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/kontakty.svg') }}" class="w-10 h-10" alt="">{{ __('nav.contacts')}}</a></li>
            <li><a href="{{asset('documents')}}" class="flex justify-center items-center gap-3 hover:text-blue-300"><img src="{{ asset('images/dokumenty.svg') }}" class="w-10 h-10" alt="">{{ __('nav.documents')}}</a></li>
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Font-size logic - robust + persistent
            const HTML = document.documentElement;
            const STORAGE_KEY = 'votum:font';
            const MIN = 1, MAX = 1.5, STEP = 0.1;

            function getSize() { return parseFloat(localStorage.getItem(STORAGE_KEY) || '1'); }
            function applySize() { HTML.style.fontSize = getSize() + 'rem'; }
            function setSize(newSize) {
                newSize = Math.round(newSize*100)/100;
                newSize = Math.min(Math.max(newSize, MIN), MAX);
                localStorage.setItem(STORAGE_KEY, String(newSize));
                applySize();
                adjustLayout();
            }
            applySize();

            // Attach buttons if present (desktop + mobile)
            const inc = document.getElementById('increase-font');
            const dec = document.getElementById('decrease-font');
            const incM = document.getElementById('increase-font-mobile');
            const decM = document.getElementById('decrease-font-mobile');

            [inc, incM].forEach(btn => btn?.addEventListener('click', e => { e.preventDefault(); setSize(getSize() + STEP); }));
            [dec, decM].forEach(btn => btn?.addEventListener('click', e => { e.preventDefault(); setSize(getSize() - STEP); }));

            // Mobile menu toggle + position adjustment
            const toggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('mobile-menu');
            const header = document.querySelector('header');
            const main = document.getElementById('site-main');
            let open = false;

            // Make sure menu is attached to body (avoids z-index/transform problems)
            if (menu && menu.parentElement !== document.body) document.body.appendChild(menu);

            function adjustLayout() {
                const headerHeight = header ? header.offsetHeight : 0;

                // move main down
                if (main) main.style.marginTop = headerHeight + 'px';

                // position mobile menu
                if (menu) {
                    menu.style.top = headerHeight - 1 + 'px';
                    menu.style.height = `calc(100vh - ${headerHeight}px)`;
                }
            }

            adjustLayout();
            window.addEventListener('resize', adjustLayout);

            if (toggle && menu) {
                toggle.addEventListener('click', e => {
                    e.stopPropagation();
                    open = !open;
                    menu.classList.toggle('hidden', !open);
                    document.body.style.overflow = open ? 'hidden' : '';
                    if (open) adjustLayout();
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

            // ========== LOCALE SWITCHING FIX ==========
            // Use event delegation on document to catch form submits from mobile menu
            document.addEventListener('submit', (e) => {
                console.log('Form submitted:', e.target);
                console.log('Form ID:', e.target?.id);
                console.log('Is mobile form?', e.target?.id === 'locale-form-mobile');

                // Check if submitted form is the mobile locale form
                if (e.target && e.target.id === 'locale-form-mobile') {
                    console.log('Saving mobile menu state!');
                    // Remember that menu was open
                    sessionStorage.setItem('votum:mobile-menu-open', 'true');
                }
            });

            // Restore mobile menu state after page reload
            if (sessionStorage.getItem('votum:mobile-menu-open') === 'true') {
                sessionStorage.removeItem('votum:mobile-menu-open');
                if (toggle && menu) {
                    open = true;
                    menu.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    adjustLayout();
                }
            }
        });
    </script>
@endpush
