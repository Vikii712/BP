document.addEventListener("DOMContentLoaded", () => {

    // ----------------------------
    // FONT SELECTION
    // ----------------------------
    const savedFontKey = localStorage.getItem('a11y_font') || 'atkinson';
    const fontRadios = document.querySelectorAll('input[name="a11y-font"]');

    fontRadios.forEach(radio => {
        if (radio.dataset.fontKey === savedFontKey) {
            radio.checked = true;
            document.body.style.fontFamily = radio.dataset.font;
        }

        radio.addEventListener('change', () => {
            document.body.style.fontFamily = radio.dataset.font;
            localStorage.setItem('a11y_font', radio.dataset.fontKey);
        });
    });

    // ----------------------------
    // COLOR FILTER RADIO
    // ----------------------------
    const savedFilter = localStorage.getItem("colorFilter") || "none";
    const filterRadios = document.querySelectorAll('input[name="a11y-color"]');

    filterRadios.forEach(input => {
        const filter = input.dataset.filter;

        if (savedFilter === filter) {
            input.checked = true;
            if (window[filter]) window[filter](true);
        }

        input.addEventListener("change", () => {
            localStorage.setItem("colorFilter", filter);
            if (window[filter]) window[filter](true);
        });
    });

    // ----------------------------
    // A11Y TOGGLE CHECKBOXES
    // ----------------------------
    document.querySelectorAll(".a11y-toggle").forEach(input => {
        const feature = input.dataset.feature;

        if (feature === 'letterSpacing' || feature === 'lineSpacing') return;

        const saved = localStorage.getItem(feature) === "true";
        input.checked = saved;

        if (saved) window[feature]?.(true);

        input.addEventListener("change", () => {
            localStorage.setItem(feature, input.checked);
            window[feature]?.(input.checked);
        });
    });

});
