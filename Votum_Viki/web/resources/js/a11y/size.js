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
    if(cls) document.documentElement.classList.add(cls);
    localStorage.setItem('a11y_fontScaleIndex', window.scaleIndex);
};

window.updateFontSpectrum = function() {
    document.querySelectorAll("[data-font-scale]").forEach(el => {
        const step = parseInt(el.dataset.fontScale);
        if(step <= window.scaleIndex){
            el.classList.add("bg-yellow-300");
        } else {
            el.classList.remove("bg-yellow-300");
        }
    });
};

// ----------------------------
// INIT
// ----------------------------
document.addEventListener("DOMContentLoaded", () => {
    const fontBtn = document.getElementById("fontScaleButton");

    // načítanie uloženého scale
    window.applyFontScale(window.scaleIndex);
    window.updateFontSpectrum();

    if(fontBtn){
        fontBtn.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation(); // zabráni duplikovanému volaniu

            let next = window.scaleIndex + 1;
            if(next >= window.SCALES.length) next = 0;

            window.applyFontScale(next);
            window.updateFontSpectrum();
            window.updateA11yButtonState();
        });
    }
});
