// ============================================================
// LETTER & LINE SPACING (globálne)
// ============================================================
window.letterSpacingLevels = ['normal', '0.01em', '0.05em', '0.15em'];
window.lineSpacingLevels = [0, 0.3, 0.5, 1];

window.letterSpacingIndex = parseInt(localStorage.getItem('letterSpacingIndex')) || 0;
window.lineSpacingIndex = parseInt(localStorage.getItem('lineSpacingIndex')) || 0;

window.originalLineHeights = new Map();

window.saveOriginalLineHeights = function() {
    document.querySelectorAll('*').forEach(el => {
        const computed = parseFloat(getComputedStyle(el).lineHeight);
        const fontSize = parseFloat(getComputedStyle(el).fontSize);
        if (!isNaN(computed) && !isNaN(fontSize)) {
            window.originalLineHeights.set(el, computed / fontSize);
        }
    });
};

window.applyLineSpacing = function(addRatio) {
    window.originalLineHeights.forEach((originalRatio, el) => {
        el.style.lineHeight = addRatio === 0 ? '' : (originalRatio + addRatio).toFixed(2);
    });
};

window.updateSpectrum = function(feature, index) {
    const spectrum = document.querySelector(`[data-spectrum="${feature}"]`);
    if (!spectrum) return;
    spectrum.querySelectorAll('[data-step]').forEach(dot => {
        const step = parseInt(dot.dataset.step);
        dot.classList.toggle('bg-black', step <= index);
        dot.classList.toggle('bg-white', step > index);
    });
};

window.syncSpectrumCheckbox = function(feature, index) {
    const input = document.querySelector(`.a11y-toggle[data-feature="${feature}"]`);
    if (input) input.checked = index > 0;
};

document.addEventListener('DOMContentLoaded', () => {
    window.saveOriginalLineHeights();

    // Obnova letterSpacing
    if (window.letterSpacingIndex > 0) {
        document.body.style.letterSpacing = window.letterSpacingLevels[window.letterSpacingIndex];
        window.updateSpectrum('letterSpacing', window.letterSpacingIndex);
        window.syncSpectrumCheckbox('letterSpacing', window.letterSpacingIndex);
    }

    // Obnova lineSpacing
    if (window.lineSpacingIndex > 0) {
        window.applyLineSpacing(window.lineSpacingLevels[window.lineSpacingIndex]);
        window.updateSpectrum('lineSpacing', window.lineSpacingIndex);
        window.syncSpectrumCheckbox('lineSpacing', window.lineSpacingIndex);
    }

    document.querySelectorAll('.a11y-toggle').forEach(input => {
        const feature = input.dataset.feature;

        // Spectrum tlačidlá preskočíme — majú vlastnú logiku
        if (feature === 'letterSpacing' || feature === 'lineSpacing') return;

        const saved = localStorage.getItem(feature) === 'true';
        input.checked = saved;
        if (saved) window[feature]?.(true);

        input.addEventListener('change', () => {
            localStorage.setItem(feature, input.checked);
            window[feature]?.(input.checked);
        });
    });

    // Spectrum tlačidlá — klik vždy cykluje
    document.querySelector('.a11y-toggle[data-feature="letterSpacing"]')
        ?.addEventListener('change', (e) => {
            e.preventDefault();
            window.letterSpacing();
        });

    document.querySelector('.a11y-toggle[data-feature="lineSpacing"]')
        ?.addEventListener('change', (e) => {
            e.preventDefault();
            window.lineSpacing();
        });
});

// ============================================================
// FUNKCIE SPACING
// ============================================================
window.letterSpacing = function() {
    window.letterSpacingIndex = (window.letterSpacingIndex + 1) % window.letterSpacingLevels.length;
    localStorage.setItem('letterSpacingIndex', window.letterSpacingIndex);
    document.body.style.letterSpacing = window.letterSpacingLevels[window.letterSpacingIndex];
    window.updateSpectrum('letterSpacing', window.letterSpacingIndex);
    window.syncSpectrumCheckbox('letterSpacing', window.letterSpacingIndex);
};

window.lineSpacing = function() {
    window.lineSpacingIndex = (window.lineSpacingIndex + 1) % window.lineSpacingLevels.length;
    localStorage.setItem('lineSpacingIndex', window.lineSpacingIndex);
    window.applyLineSpacing(window.lineSpacingLevels[window.lineSpacingIndex]);
    window.updateSpectrum('lineSpacing', window.lineSpacingIndex);
    window.syncSpectrumCheckbox('lineSpacing', window.lineSpacingIndex);
};
