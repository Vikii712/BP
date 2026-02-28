<div>
    {{-- Trigger Button --}}
    <button
        id="a11y-btn"
        onclick="a11yToggle()"
        aria-label="Otvoriť menu prístupnosti"
        aria-expanded="false"
        aria-controls="a11y-panel"
        class="fixed bottom-6 right-6 z-50 p-2 border-2 border-black rounded-full bg-yellow-400 shadow-2xl flex items-center justify-center text-2xl text-gray-900 focus:outline-none focus:ring-4 focus:ring-yellow-400"
    >
        <i class="fa-solid fa-universal-access text-5xl"></i>
    </button>

    {{-- Panel --}}
    <div
        id="a11y-panel"
        role="dialog"
        aria-label="Menu prístupnosti"
        class="fixed bottom-24 right-6 z-40 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden hidden"
    >
        {{-- Header --}}
        <div class="bg-yellow-400 px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-universal-access text-gray-900"></i>
                <span class="font-bold text-gray-900 text-sm uppercase tracking-wide">Prístupnosť</span>
            </div>
            <button
                onclick="a11yClose()"
                aria-label="Zatvoriť"
                class="w-7 h-7 rounded-full bg-black/10 hover:bg-black/20 flex items-center justify-center text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="p-4 flex flex-col gap-3">

            {{-- Font size --}}
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fa-solid fa-text-height text-yellow-500"></i>
                    <span class="text-sm font-semibold text-gray-700">Veľkosť textu</span>
                </div>
                <div class="flex items-center gap-2">
                    <button
                        onclick="a11yFontDecrease()"
                        aria-label="Zmenšiť text"
                        class="flex-1 py-2 rounded-lg border border-gray-200 bg-white text-gray-600 text-sm font-medium hover:bg-gray-100 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    >
                        <i class="fa-solid fa-minus mr-1"></i>Menší
                    </button>
                    <span id="a11y-font-label" class="w-12 text-center text-xs text-gray-400 font-mono">100%</span>
                    <button
                        onclick="a11yFontIncrease()"
                        aria-label="Zväčšiť text"
                        class="flex-1 py-2 rounded-lg border border-gray-200 bg-white text-gray-600 text-sm font-medium hover:bg-gray-100 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    >
                        <i class="fa-solid fa-plus mr-1"></i>Väčší
                    </button>
                </div>
            </div>

            {{-- Contrast --}}
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fa-solid fa-circle-half-stroke text-yellow-500"></i>
                    <span class="text-sm font-semibold text-gray-700">Kontrast</span>
                </div>
                <div class="flex gap-2">
                    <button
                        id="a11y-contrast-normal"
                        onclick="a11ySetContrast('normal')"
                        class="flex-1 py-2 rounded-lg border text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-yellow-400 border-yellow-400 text-gray-900 font-semibold"
                    >
                        Normálny
                    </button>
                    <button
                        id="a11y-contrast-high"
                        onclick="a11ySetContrast('high')"
                        class="flex-1 py-2 rounded-lg border text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white border-gray-200 text-gray-600 hover:bg-gray-100"
                    >
                        Vysoký
                    </button>
                </div>
            </div>

            {{-- Toggle switches --}}
            <div class="bg-gray-50 rounded-xl p-4 flex flex-col gap-3">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-sliders text-yellow-500"></i>
                    <span class="text-sm font-semibold text-gray-700">Funkcie</span>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fa-solid fa-font text-gray-400 text-xs"></i>
                        Dyslektické písmo
                    </span>
                    <button
                        id="a11y-sw-dyslexia"
                        role="switch"
                        aria-checked="false"
                        onclick="a11ySwitch('dyslexia')"
                        class="relative w-10 h-5 rounded-full bg-gray-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1"
                    ><span class="absolute top-0.5 left-1 w-4 h-4 bg-white rounded-full shadow transition-all duration-200"></span></button>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fa-solid fa-link text-gray-400 text-xs"></i>
                        Zvýrazniť odkazy
                    </span>
                    <button
                        id="a11y-sw-links"
                        role="switch"
                        aria-checked="false"
                        onclick="a11ySwitch('links')"
                        class="relative w-10 h-5 rounded-full bg-gray-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1"
                    ><span class="absolute top-0.5 left-1 w-4 h-4 bg-white rounded-full shadow transition-all duration-200"></span></button>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fa-solid fa-pause text-gray-400 text-xs"></i>
                        Znížiť animácie
                    </span>
                    <button
                        id="a11y-sw-motion"
                        role="switch"
                        aria-checked="false"
                        onclick="a11ySwitch('motion')"
                        class="relative w-10 h-5 rounded-full bg-gray-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1"
                    ><span class="absolute top-0.5 left-1 w-4 h-4 bg-white rounded-full shadow transition-all duration-200"></span></button>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fa-solid fa-crosshairs text-gray-400 text-xs"></i>
                        Fokus mód
                    </span>
                    <button
                        id="a11y-sw-focus"
                        role="switch"
                        aria-checked="false"
                        onclick="a11ySwitch('focus')"
                        class="relative w-10 h-5 rounded-full bg-gray-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1"
                    ><span class="absolute top-0.5 left-1 w-4 h-4 bg-white rounded-full shadow transition-all duration-200"></span></button>
                </div>
            </div>

            {{-- Reset --}}
            <button
                onclick="a11yReset()"
                class="w-full py-2.5 rounded-xl border border-gray-200 text-gray-500 text-sm hover:bg-gray-50 hover:text-gray-700 hover:border-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400"
            >
                <i class="fa-solid fa-rotate-left mr-2"></i>Obnoviť predvolené
            </button>

        </div>
    </div>
</div>


<style>
    html.a11y-high-contrast { filter: contrast(1.6); }
    html.a11y-high-contrast body { background: #fff !important; color: #000 !important; }
    html.a11y-high-contrast a { color: #0000cc !important; text-decoration: underline !important; }

    html.a11y-dyslexia, html.a11y-dyslexia * {
        font-family: 'Comic Sans MS', 'Trebuchet MS', Arial, sans-serif !important;
        letter-spacing: 0.05em !important;
        line-height: 1.9 !important;
        word-spacing: 0.1em !important;
    }

    html.a11y-highlight-links a {
        background: #ffff00 !important;
        color: #000 !important;
        text-decoration: underline !important;
        padding: 0 3px !important;
        border-radius: 2px;
    }

    html.a11y-reduce-motion *, html.a11y-reduce-motion *::before, html.a11y-reduce-motion *::after {
        animation-duration: 0.001ms !important;
        transition-duration: 0.001ms !important;
    }

    html.a11y-focus-mode *:not(:focus):not(:focus-within) { opacity: 0.5; }
    html.a11y-focus-mode *:focus, html.a11y-focus-mode *:focus-within {
        opacity: 1 !important;
        outline: 3px solid #F5C400 !important;
        outline-offset: 2px;
    }
</style>


<script>
    var a11yFontStep = 0;
    var a11yState = { dyslexia: false, links: false, motion: false, focus: false };
    var a11yClassMap = {
        dyslexia: 'a11y-dyslexia',
        links:    'a11y-highlight-links',
        motion:   'a11y-reduce-motion',
        focus:    'a11y-focus-mode'
    };

    // Načítaj uložené nastavenia hneď
    (function () {
        try {
            var saved = JSON.parse(localStorage.getItem('a11y') || '{}');
            if (saved.fontStep) { a11yFontStep = saved.fontStep; a11yApplyFontSize(); }
            if (saved.contrast === 'high') a11yApplyContrast('high');
            ['dyslexia', 'links', 'motion', 'focus'].forEach(function (k) {
                if (saved[k]) a11yActivateSwitch(k);
            });
        } catch (e) {}
    })();

    function a11yToggle() {
        var panel = document.getElementById('a11y-panel');
        var btn   = document.getElementById('a11y-btn');
        var open  = panel.classList.contains('hidden');
        panel.classList.toggle('hidden', !open);
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    }

    function a11yClose() {
        document.getElementById('a11y-panel').classList.add('hidden');
        document.getElementById('a11y-btn').setAttribute('aria-expanded', 'false');
    }

    document.addEventListener('click', function (e) {
        var panel = document.getElementById('a11y-panel');
        var btn   = document.getElementById('a11y-btn');
        if (panel && btn && !panel.contains(e.target) && !btn.contains(e.target)) a11yClose();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') a11yClose();
    });

    function a11yApplyFontSize() {
        var pct = 100 + a11yFontStep * 12.5;
        document.documentElement.style.fontSize = pct + '%';
        var lbl = document.getElementById('a11y-font-label');
        if (lbl) lbl.textContent = Math.round(pct) + '%';
        a11ySave();
    }

    function a11yFontIncrease() { if (a11yFontStep < 4)  { a11yFontStep++; a11yApplyFontSize(); } }
    function a11yFontDecrease() { if (a11yFontStep > -2) { a11yFontStep--; a11yApplyFontSize(); } }

    function a11yApplyContrast(val) {
        document.documentElement.classList.toggle('a11y-high-contrast', val === 'high');
        var btnN = document.getElementById('a11y-contrast-normal');
        var btnH = document.getElementById('a11y-contrast-high');
        if (!btnN || !btnH) return;
        var on  = ['bg-yellow-400', 'border-yellow-400', 'text-gray-900', 'font-semibold'];
        var off = ['bg-white', 'border-gray-200', 'text-gray-600'];
        if (val === 'high') {
            on.forEach(function(c){ btnH.classList.add(c); });
            off.forEach(function(c){ btnH.classList.remove(c); });
            off.forEach(function(c){ btnN.classList.add(c); });
            on.forEach(function(c){ btnN.classList.remove(c); });
        } else {
            on.forEach(function(c){ btnN.classList.add(c); });
            off.forEach(function(c){ btnN.classList.remove(c); });
            off.forEach(function(c){ btnH.classList.add(c); });
            on.forEach(function(c){ btnH.classList.remove(c); });
        }
    }

    function a11ySetContrast(val) { a11yApplyContrast(val); a11ySave(); }

    function a11yActivateSwitch(key) {
        a11yState[key] = true;
        document.documentElement.classList.add(a11yClassMap[key]);
        var sw = document.getElementById('a11y-sw-' + key);
        if (!sw) return;
        sw.setAttribute('aria-checked', 'true');
        sw.classList.remove('bg-gray-200');
        sw.classList.add('bg-yellow-400');
        sw.querySelector('span').style.transform = 'translateX(20px)';
    }

    function a11yDeactivateSwitch(key) {
        a11yState[key] = false;
        document.documentElement.classList.remove(a11yClassMap[key]);
        var sw = document.getElementById('a11y-sw-' + key);
        if (!sw) return;
        sw.setAttribute('aria-checked', 'false');
        sw.classList.remove('bg-yellow-400');
        sw.classList.add('bg-gray-200');
        sw.querySelector('span').style.transform = 'translateX(0)';
    }

    function a11ySwitch(key) {
        a11yState[key] ? a11yDeactivateSwitch(key) : a11yActivateSwitch(key);
        a11ySave();
    }

    function a11yReset() {
        a11yFontStep = 0;
        a11yApplyFontSize();
        a11yApplyContrast('normal');
        Object.keys(a11yState).forEach(function (k) { a11yDeactivateSwitch(k); });
        localStorage.removeItem('a11y');
    }

    function a11ySave() {
        try {
            localStorage.setItem('a11y', JSON.stringify({
                fontStep: a11yFontStep,
                contrast: document.documentElement.classList.contains('a11y-high-contrast') ? 'high' : 'normal',
                dyslexia: a11yState.dyslexia,
                links:    a11yState.links,
                motion:   a11yState.motion,
                focus:    a11yState.focus
            }));
        } catch (e) {}
    }
</script>
