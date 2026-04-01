document.getElementById("a11y-reset")?.addEventListener("click", () => {

    // --- Letter spacing ---
    window.letterSpacingIndex = 0;
    localStorage.setItem('letterSpacingIndex', letterSpacingIndex);
    document.body.style.letterSpacing = letterSpacingLevels[0];
    updateSpectrum('letterSpacing', 0);

    // --- Line spacing ---
    window.lineSpacingIndex = 0;
    localStorage.setItem('lineSpacingIndex', lineSpacingIndex);
    applyLineSpacing(0);
    updateSpectrum('lineSpacing', 0);

    // --- Font scale ---
    applyFontScale(0);
    updateFontSpectrum();

    // --- Font family ---
    localStorage.setItem('a11y_font', 'atkinson');
    document.querySelectorAll('input[name="a11y-font"]').forEach(radio => {
        radio.checked = radio.dataset.fontKey === 'atkinson';
    });
    document.body.style.fontFamily = document.querySelector('input[data-font-key="atkinson"]').dataset.font;

    // --- Color filter ---
    localStorage.setItem('colorFilter', 'none');
    document.querySelectorAll('input[name="a11y-color"]').forEach(input => {
        input.checked = input.dataset.filter === 'none';
    });
    if(window.none) window.none();

    // --- ostatné toggly ---
    document.querySelectorAll('.a11y-toggle').forEach(input => {
        const feature = input.dataset.feature;
        if(feature === 'letterSpacing' || feature === 'lineSpacing') return;
        input.checked = false;
        localStorage.removeItem(feature);
        window[feature]?.(false);
    });

    window.updateA11yButtonState();

});
