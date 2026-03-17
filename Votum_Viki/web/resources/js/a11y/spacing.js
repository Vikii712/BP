// ============================================================
// LETTER & LINE SPACING (globálne)
// ============================================================
window.letterSpacingLevels = ['normal', '0.05em', '0.15em'];
window.lineSpacingLevels = [0, 0.5, 1];

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
        dot.classList.toggle('bg-black', step <= index + 1);
        dot.classList.toggle('bg-white', step > index + 1);
    });
};

window.letterSpacing = function() {
    window.letterSpacingIndex = (window.letterSpacingIndex + 1) % window.letterSpacingLevels.length;
    localStorage.setItem('letterSpacingIndex', window.letterSpacingIndex);
    document.body.style.letterSpacing = window.letterSpacingLevels[window.letterSpacingIndex];
    window.updateSpectrum('letterSpacing', window.letterSpacingIndex);

    console.log('teraz hodnoty po update: ', { letterSpacingIndex: window.letterSpacingIndex, lineSpacingIndex: window.lineSpacingIndex });

    window.updateA11yButtonState();
};

window.lineSpacing = function() {
    window.lineSpacingIndex = (window.lineSpacingIndex + 1) % window.lineSpacingLevels.length;
    localStorage.setItem('lineSpacingIndex', window.lineSpacingIndex);
    window.applyLineSpacing(window.lineSpacingLevels[window.lineSpacingIndex]);
    window.updateSpectrum('lineSpacing', window.lineSpacingIndex);

    window.updateA11yButtonState();
};

// ============================================================
// INIT
// ============================================================
document.addEventListener('DOMContentLoaded', () => {
    window.saveOriginalLineHeights();

    // Obnova letterSpacing + spectrum
    if (window.letterSpacingIndex > 0) {
        document.body.style.letterSpacing = window.letterSpacingLevels[window.letterSpacingIndex];
        window.updateSpectrum('letterSpacing', window.letterSpacingIndex);
    }

    // Obnova lineSpacing + spectrum
    if (window.lineSpacingIndex > 0) {
        window.applyLineSpacing(window.lineSpacingLevels[window.lineSpacingIndex]);
        window.updateSpectrum('lineSpacing', window.lineSpacingIndex);
    }


    // Event listenery pre spectrum
    const letterInput = document.querySelector('.a11y-toggle[data-feature="letterSpacing"]');
    const lineInput = document.querySelector('.a11y-toggle[data-feature="lineSpacing"]');

    if(letterInput){
        letterInput.addEventListener('change', (e) => {
            e.preventDefault();
            window.letterSpacing();
        });
    }

    if(lineInput){
        lineInput.addEventListener('change', (e) => {
            e.preventDefault();
            window.lineSpacing();
        });
    }

});
