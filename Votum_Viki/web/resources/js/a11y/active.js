// ----------------------------
// A11Y TOGGLE BUTTON STATE
// ----------------------------
const a11yButton = document.getElementById("a11y-toggle");

window.updateA11yButtonState = function() {
    let isDefault = true;
    console.log('updateA11yButtonState called', { letterSpacingIndex: window.letterSpacingIndex, lineSpacingIndex: window.lineSpacingIndex, scaleIndex: window.scaleIndex });

    // --- LETTER & LINE SPACING ---
    if ((window.letterSpacingIndex || 0) > 0) isDefault = false;
    if ((window.lineSpacingIndex || 0) > 0) isDefault = false;

    // --- FONT SCALE ---
    if ((window.scaleIndex || 0) > 0) isDefault = false;

    // --- FONT FAMILY ---
    const selectedFont = document.querySelector('input[name="a11y-font"]:checked');
    if (selectedFont && selectedFont.dataset.fontKey !== 'atkinson') {
        isDefault = false;
    }

    // --- COLOR FILTER ---
    const selectedFilter = document.querySelector('input[name="a11y-color"]:checked');
    if (selectedFilter && selectedFilter.dataset.filter !== 'none') {
        isDefault = false;
    }

    // --- OSTATNÉ TOGGLY ---
    document.querySelectorAll('.a11y-toggle').forEach(input => {
        const feature = input.dataset.feature;

        // preskočíme spacing (ten sa kontroluje cez index)
        if (feature === 'letterSpacing' || feature === 'lineSpacing') return;

        if (input.checked) isDefault = false;
    });

    // --- ZMENA FARBY POZADIA TLAČIDLA ---
    if (isDefault) {
        a11yButton.classList.remove('bg-yellow-300');
        a11yButton.classList.add('bg-gray-300');
    } else {
        a11yButton.classList.remove('bg-gray-300');
        a11yButton.classList.add('bg-yellow-300');
    }
}

// ----------------------------
// EVENT LISTENERY
// ----------------------------

// Checkbox toggly
document.querySelectorAll('.a11y-toggle').forEach(input => {
    input.addEventListener('change', updateA11yButtonState);
});

// Radio pre font a color
document.querySelectorAll('input[name="a11y-font"], input[name="a11y-color"]').forEach(input => {
    input.addEventListener('change', updateA11yButtonState);
});

// Font scale pozorujeme cez triedy na <html>
if (window.scaleIndex !== undefined) {
    const observer = new MutationObserver(updateA11yButtonState);
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
}

// Po načítaní DOM
document.addEventListener("DOMContentLoaded", () => {
    window.updateA11yButtonState();
});
