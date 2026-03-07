const letterSpacingLevels = ['normal', '0.01em', '0.05em', '0.15em'];
const lineSpacingLevels = [0, 0.3, 0.5, 1];

let letterSpacingIndex = parseInt(localStorage.getItem('letterSpacingIndex')) || 0;
let lineSpacingIndex = parseInt(localStorage.getItem('lineSpacingIndex')) || 0;

const originalLineHeights = new Map();

function saveOriginalLineHeights() {
    document.querySelectorAll('*').forEach(el => {
        const computed = parseFloat(getComputedStyle(el).lineHeight);
        const fontSize = parseFloat(getComputedStyle(el).fontSize);
        if (!isNaN(computed) && !isNaN(fontSize)) {
            originalLineHeights.set(el, computed / fontSize);
        }
    });
}

function applyLineSpacing(addRatio) {
    originalLineHeights.forEach((originalRatio, el) => {
        el.style.lineHeight = addRatio === 0 ? '' : (originalRatio + addRatio).toFixed(2);
    });
}

function updateSpectrum(feature, index) {
    const spectrum = document.querySelector(`[data-spectrum="${feature}"]`);
    if (!spectrum) return;
    spectrum.querySelectorAll('[data-step]').forEach(dot => {
        const step = parseInt(dot.dataset.step);
        dot.classList.toggle('bg-black', step <= index);
        dot.classList.toggle('bg-white', step > index);
    });
}

function syncSpectrumCheckbox(feature, index) {
    const input = document.querySelector(`.a11y-toggle[data-feature="${feature}"]`);
    if (input) input.checked = index > 0;
}

document.addEventListener('DOMContentLoaded', () => {
    saveOriginalLineHeights();

    // Obnova letterSpacing
    if (letterSpacingIndex > 0) {
        document.body.style.letterSpacing = letterSpacingLevels[letterSpacingIndex];
        updateSpectrum('letterSpacing', letterSpacingIndex);
        syncSpectrumCheckbox('letterSpacing', letterSpacingIndex);
    }

    // Obnova lineSpacing
    if (lineSpacingIndex > 0) {
        applyLineSpacing(lineSpacingLevels[lineSpacingIndex]);
        updateSpectrum('lineSpacing', lineSpacingIndex);
        syncSpectrumCheckbox('lineSpacing', lineSpacingIndex);
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
            e.preventDefault(); // zabránime default checked logike
            window.letterSpacing();
        });

    document.querySelector('.a11y-toggle[data-feature="lineSpacing"]')
        ?.addEventListener('change', (e) => {
            e.preventDefault();
            window.lineSpacing();
        });
});

window.letterSpacing = function() {
    letterSpacingIndex = (letterSpacingIndex + 1) % letterSpacingLevels.length;
    localStorage.setItem('letterSpacingIndex', letterSpacingIndex);
    document.body.style.letterSpacing = letterSpacingLevels[letterSpacingIndex];
    updateSpectrum('letterSpacing', letterSpacingIndex);
    syncSpectrumCheckbox('letterSpacing', letterSpacingIndex);
};

window.lineSpacing = function() {
    lineSpacingIndex = (lineSpacingIndex + 1) % lineSpacingLevels.length;
    localStorage.setItem('lineSpacingIndex', lineSpacingIndex);
    applyLineSpacing(lineSpacingLevels[lineSpacingIndex]);
    updateSpectrum('lineSpacing', lineSpacingIndex);
    syncSpectrumCheckbox('lineSpacing', lineSpacingIndex);
};
