// ----------------------------
// A11Y TOGGLE BUTTON STATE
// ----------------------------
const a11yButton = document.getElementById("a11y-toggle");

function updateA11yButtonState() {
    // predpokladáme default hodnoty
    let isDefault = true;

    // --- letter spacing ---
    if(letterSpacingIndex > 0) isDefault = false;

    // --- line spacing ---
    if(lineSpacingIndex > 0) isDefault = false;

    // --- font scale ---
    if(scaleIndex > 0) isDefault = false;

    // --- font family ---
    const selectedFont = document.querySelector('input[name="a11y-font"]:checked');
    if(selectedFont && selectedFont.dataset.fontKey !== 'atkinson'){
        isDefault = false;
    }

    // --- color filter ---
    const selectedFilter = document.querySelector('input[name="a11y-color"]:checked');
    if(selectedFilter && selectedFilter.dataset.filter !== 'none'){
        isDefault = false;
    }

    // --- ostatné toggly ---
    document.querySelectorAll('.a11y-toggle').forEach(input => {
        const feature = input.dataset.feature;
        if(feature === 'letterSpacing' || feature === 'lineSpacing') return;
        if(input.checked) isDefault = false;
    });

    // zmena farby pozadia tlačidla
    if(isDefault){
        a11yButton.classList.remove('bg-yellow-300');
        a11yButton.classList.add('bg-gray-300');
    } else {
        a11yButton.classList.remove('bg-gray-300');
        a11yButton.classList.add('bg-yellow-300');
    }
}

// volanie vždy po zmene niektorej funkcie
document.querySelectorAll('.a11y-toggle').forEach(input => {
    input.addEventListener('change', updateA11yButtonState);
});

// volanie po zmene font scale
if(window.scaleIndex !== undefined){
    const observer = new MutationObserver(updateA11yButtonState);
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
}

// volanie po zmene fontu a filter
document.querySelectorAll('input[name="a11y-font"], input[name="a11y-color"]').forEach(input => {
    input.addEventListener('change', updateA11yButtonState);
});

document.addEventListener("DOMContentLoaded", () => {
    updateA11yButtonState();
});
