document.addEventListener("DOMContentLoaded", () => {

    const savedScale = localStorage.getItem('a11y_fontScaleIndex');

    if (savedScale !== null) {
        applyFontScale(parseInt(savedScale));
        document.querySelector('[data-feature="increaseFont"]')
    }

    document.querySelectorAll(".a11y-toggle").forEach(input => {
        const feature = input.dataset.feature;

        if (feature === 'letterSpacing' || feature === 'lineSpacing') return;

        const saved = localStorage.getItem(feature) === "true";
        input.checked = saved;

        if (saved) {
            window[feature]?.(true);
        }

        input.addEventListener("change", () => {
            localStorage.setItem(feature, input.checked);
            window[feature]?.(input.checked);
        });
    });


    const savedFilter = localStorage.getItem("colorFilter");

    document.querySelectorAll('input[name="a11y-color"]').forEach(input => {

        const filter = input.dataset.filter;

        if (savedFilter === filter) {
            input.checked = true;
            window[filter]?.(true);
        }

        input.addEventListener("change", () => {
            localStorage.setItem("colorFilter", filter);
            window[filter]?.(true);
        });

    });

});
