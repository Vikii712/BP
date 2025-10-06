<header class="bg-blue-50 shadow-sm sticky top-0 z-40">
    <div class="flex items-center justify-between px-4">
        <!-- Logo + Title -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="VOTUM logo" class="w-12 h-12" />
            <h1 class="text-2xl font-semibold text-blue-800">VOTUM</h1>
        </div>

        <!-- Right Controls -->
        <div class="flex items-center gap-6 ml-auto">

            <!-- Font size controls -->
            <div class="flex items-center gap-2 bg-blue-100 rounded-full px-3 py-1 shadow-sm">
                <button id="decrease-font" type="button"
                        class="text-blue-700 hover:text-blue-900 font-bold text-lg px-2">
                    –
                </button>
                <span class="text-sm text-blue-800">aA</span>
                <button id="increase-font" type="button"
                        class="text-blue-700 hover:text-blue-900 font-bold text-lg px-2">
                    +
                </button>
            </div>

            <!-- Language switch -->
            <form action="{{ route('set-locale') }}" method="post" class="flex items-center gap-2 bg-blue-100 rounded-full px-3 py-1 shadow-sm">
                @csrf
                <button type="submit" name="locale" value="sk"
                        class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                               {{ session('locale','sk')==='sk' ? 'bg-blue-200 text-blue-900' : 'text-blue-700 hover:text-blue-900' }}">SK
                </button>

                <button type="submit" name="locale" value="en"
                        class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                               {{ session('locale')==='en' ? 'bg-blue-200 text-blue-900' : 'text-blue-700 hover:text-blue-900' }}">EN
                </button>
            </form>
        </div>
    </div>

    <!-- Navigation -->
    <x-nav />
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
