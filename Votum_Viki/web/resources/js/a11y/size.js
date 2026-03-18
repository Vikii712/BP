// ============================================================
// FONT SCALE (globálne)
// ============================================================
window.SCALES = [1.0, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6];
window.SCALE_CLASSES = ['', 'a11y-scale-lg', 'a11y-scale-xl', 'a11y-scale-xxl', 'a11y-scale-xxxl', 'a11y-scale-xxxxl', 'a11y-scale-xxxxxl'];
window.scaleIndex = parseInt(localStorage.getItem('a11y_fontScaleIndex')) || 0;

window.applyFontScale = function(index) {
    window.scaleIndex = Math.min(window.SCALES.length - 1, Math.max(0, index));
    document.documentElement.classList.remove(...window.SCALE_CLASSES.filter(Boolean));
    const cls = window.SCALE_CLASSES[window.scaleIndex];
    if (cls) document.documentElement.classList.add(cls);
    localStorage.setItem('a11y_fontScaleIndex', window.scaleIndex);

    // Aktualizuj nav po každej zmene zoomu
    window.updateNavMode();
};

window.updateFontSpectrum = function() {
    document.querySelectorAll("[data-font-scale]").forEach(el => {
        const step = parseInt(el.dataset.fontScale);
        if (step <= window.scaleIndex) {
            el.classList.add("bg-yellow-300");
        } else {
            el.classList.remove("bg-yellow-300");
        }
    });
};

// ============================================================
// NAV MODE — hamburger vs desktop nav
// ============================================================
// Prah (px) pod ktorým sa zobrazí hamburger namiesto desktop navu.
// Zodpovedá Tailwind "md" breakpointu = 768px.
// Efektívna šírka = reálna šírka viewportu / zoom faktor —
// teda pri väčšom zoome sa nav skôr prepne na hamburger.
var NAV_BREAKPOINT = 768;

window.updateNavMode = function() {
    const scale  = window.SCALES[window.scaleIndex] ?? 1.0;
    const vw     = window.visualViewport ? window.visualViewport.width : window.innerWidth;
    const effectiveVw = vw / scale;

    const showDesktop = effectiveVw >= NAV_BREAKPOINT;

    document.getElementById('main-header')
        ?.classList.toggle('show-desktop-nav', showDesktop);
};

// Resize — desktop
window.addEventListener('resize', window.updateNavMode);

// visualViewport — spoľahlivejšie na mobile (iOS Safari, Android Chrome)
if (window.visualViewport) {
    window.visualViewport.addEventListener('resize', window.updateNavMode);
}

// orientationchange — iOS fallback (reportuje starú šírku, preto timeout)
window.addEventListener('orientationchange', function() {
    setTimeout(window.updateNavMode, 100);
});

// ----------------------------
// INIT
// ----------------------------
document.addEventListener("DOMContentLoaded", () => {
    const fontBtn = document.getElementById("fontScaleButton");

    // Načítanie uloženého scale + init nav
    window.applyFontScale(window.scaleIndex);
    window.updateFontSpectrum();
    // updateNavMode sa zavolal už v applyFontScale vyššie,
    // ale voláme znova pre istotu (DOM je teraz plne načítaný)
    window.updateNavMode();

    if (fontBtn) {
        fontBtn.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();

            let next = window.scaleIndex + 1;
            if (next >= window.SCALES.length) next = 0;

            window.applyFontScale(next);
            window.updateFontSpectrum();
            window.updateA11yButtonState();
        });
    }
});
