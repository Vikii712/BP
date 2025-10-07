<header class="fixed top-0 left-0 right-0 z-50 bg-blue-950 backdrop-blur-md shadow-md px-6 pt-3 pb-2">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img alt="logo" src="{{asset("images/logo.png")}}" width="80">
            <h1 class="text-xl md:text-2xl font-semibold text-[var(--cream)]">VOTUM</h1>
        </div>

        <div class="flex items-center gap-4">
            <!-- Font controls -->
            <div class="flex items-center gap-2 bg-blue-900 rounded-full px-3 py-1">
                <button id="decrease-font" type="button" class="text-[var(--cream)] hover:text-blue-950 font-bold text-lg px-1">–</button>
                <span class="text-sm text-[var(--cream)]">aA</span>
                <button id="increase-font" type="button" class="text-[var(--cream)] hover:text-blue-950 font-bold text-lg px-1">+</button>
            </div>

            <!-- Language switch -->
            <form action="{{ route('set-locale') }}" method="post"
                  class="flex items-center gap-1 bg-blue-900 rounded-full px-3 py-1">
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
            <button id="menu-toggle" aria-label="Toggle menu"
                    class="md:hidden p-2 rounded-full text-[var(--cream)] hover:bg-blue-800 transition z-[60] relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="mt-2 hidden md:block">
        <x-nav />
    </div>
</header>


<!-- Mobile full-screen menu -->
<div id="mobile-menu"
     class="fixed top-0 left-0 w-full h-full bg-blue-950 text-[var(--cream)] hidden z-[100] overflow-y-auto">
    <div class="p-8 pt-24 flex flex-col items-center gap-6">
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



@push('scripts')
    <script>
        (function () {
            const html = document.documentElement;
            const inc = document.getElementById('increase-font');
            const dec = document.getElementById('decrease-font');

            function getSize() { return parseFloat(localStorage.getItem('font') || 1); }
            function apply() { html.style.fontSize = getSize() + 'rem'; }

            inc.addEventListener('click', () => {
                let s = getSize();
                if (s < 1.5) {
                    s = +(s + 0.1).toFixed(2);
                    localStorage.setItem('font', s);
                    apply();
                }
            });

            dec.addEventListener('click', () => {
                let s = getSize();
                if (s > 0.8) {
                    s = +(s - 0.1).toFixed(2);
                    localStorage.setItem('font', s);
                    apply();
                }
            });

            apply();
        })();
    </script>
@endpush
