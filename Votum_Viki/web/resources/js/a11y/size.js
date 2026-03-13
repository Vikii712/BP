// ============================================================
// FONT SCALE
// ============================================================
const SCALES = [1.0, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6];
const SCALE_CLASSES = ['', 'a11y-scale-lg', 'a11y-scale-xl', 'a11y-scale-xxl', 'a11y-scale-xxxl', 'a11y-scale-xxxxl', 'a11y-scale-xxxxxl'];
const DEFAULT_INDEX = 0;
let scaleIndex = DEFAULT_INDEX;

function applyFontScale(index) {
    scaleIndex = Math.min(SCALES.length - 1, Math.max(0, index));
    document.documentElement.classList.remove(...SCALE_CLASSES.filter(Boolean));
    const cls = SCALE_CLASSES[scaleIndex];
    if (cls) document.documentElement.classList.add(cls);
    localStorage.setItem('a11y_fontScaleIndex', scaleIndex);
}

window.increaseFont = function() { applyFontScale(scaleIndex + 1); };
window.decreaseFont = function() { applyFontScale(scaleIndex - 1); };

