<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="mx-auto flex items-center justify-between py-3 px-4">
        <!-- Logo + Title -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="VOTUM logo" class="w-12 h-12" />
            <h1 class="text-2xl font-semibold text-slate-800">VOTUM</h1>
        </div>

        <!-- Right Controls -->
        <div class="flex items-center gap-6 ml-auto">

            <!-- Font size controls -->
            <div class="inline-flex rounded-md shadow-sm" role="group" aria-label="Font size controls">
                <button id="decrease-font" type="button"
                        class="px-3 py-1 text-sm font-medium bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                    –
                </button>
                <span class="px-3 py-1 text-sm font-medium bg-white border-t border-b border-gray-300">Font</span>
                <button id="increase-font" type="button"
                        class="px-3 py-1 text-sm font-medium bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                    +
                </button>
            </div>

            <!-- Language switch -->
            <form action="{{ route('set-locale') }}" method="post" class="inline-flex rounded-md shadow-sm" role="group" aria-label="Language selector">
                @csrf
                <button type="submit" name="locale" value="sk"
                        class="flex flex-col items-center px-3 py-1 text-sm font-medium bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 {{ session('locale','sk')==='sk' ? 'bg-blue-50 text-blue-600' : '' }}">
                    <img src="{{ asset('images/sk.svg') }}" alt="Slovak flag" class="w-6 h-4 mb-1">
                    SK
                </button>
                <button type="submit" name="locale" value="en"
                        class="flex flex-col items-center px-3 py-1 text-sm font-medium bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 {{ session('locale')==='en' ? 'bg-blue-50 text-blue-600' : '' }}">
                    <img src="{{ asset('images/uk.svg') }}" alt="English flag" class="w-6 h-4 mb-1">
                    EN
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
