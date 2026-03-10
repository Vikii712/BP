window.monochrome = function(enabled) {
    document.querySelectorAll(".filter-container").forEach(el => {
        el.classList.toggle("monochrome", enabled);
    });
}
