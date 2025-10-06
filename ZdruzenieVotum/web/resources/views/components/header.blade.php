<header class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-[95%] md:w-[90%] max-w-7xl bg-blue-950 backdrop-blur-md rounded-4xl shadow-md px-6 pt-3">
    <div class="flex items-center justify-between">
        <!-- Logo + Title -->
        <div class="flex items-center gap-3">
            <h1 class="text-xl md:text-2xl font-semibold text-[var(--cream)] ">VOTUM</h1>
        </div>

        <!-- Right Controls -->
        <div class="flex items-center gap-4">
            <!-- Font size controls -->
            <div class="flex items-center gap-2 bg-blue-900 rounded-full px-3 py-1">
                <button id="decrease-font" type="button"
                        class="text-[var(--cream)] hover:text-blue-950 hover:[var(--cream)] font-bold text-lg px-1">
                    –
                </button>
                <span class="text-sm text-[var(--cream)]">aA</span>
                <button id="increase-font" type="button"
                        class="text-[var(--cream)] hover:text-blue-950 hover:[var(--cream)] font-bold text-lg px-1">
                    +
                </button>
            </div>

            <!-- Language switch -->
            <form action="{{ route('set-locale') }}" method="post"
                  class="flex items-center gap-1 bg-blue-900 rounded-full px-3 py-1">
                @csrf
                <button type="submit" name="locale" value="sk"
                        class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                               {{ session('locale','sk')==='sk' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)] ' }}">
                    SK
                </button>
                <button type="submit" name="locale" value="en"
                        class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                               {{ session('locale')==='en' ? ' bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
                    EN
                </button>
            </form>
        </div>
    </div>

    <!-- Navigation -->
    <div class="mt-2">
        <x-nav />
    </div>
</header>

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
