const colorFilters = ["none","monochrome", "darkMode", "lightMode", "lowSaturation", "highSaturation"];

function disableAllFilters() {
    document.querySelectorAll(".filter-container").forEach(el => {
        colorFilters.forEach(f => el.classList.remove(f));
    });
}

window.monochrome = function(enabled) {
    disableAllFilters();
    if (!enabled) return;

    document.querySelectorAll(".filter-container").forEach(el => {
        el.classList.add("monochrome");
    });
}

window.none = function() {
    disableAllFilters();
    document.body.classList.remove("highlight-links");
}

window.darkMode = function(enabled) {
    disableAllFilters();
    if (!enabled) return;

    document.querySelectorAll(".filter-container").forEach(el => {
        el.classList.add("darkMode");
    });
}

window.lightMode = function(enabled) {
    disableAllFilters();


    if (!enabled) return;

    document.querySelectorAll(".filter-container").forEach(el => {
        el.classList.add("lightMode");
    });

}

window.lowSaturation = function(enabled) {
    disableAllFilters();
    if (!enabled) return;

    document.querySelectorAll(".filter-container").forEach(el => {
        el.classList.add("lowSaturation");
    });
}

window.highSaturation = function(enabled) {
    disableAllFilters();
    if (!enabled) return;

    document.querySelectorAll(".filter-container").forEach(el => {
        el.classList.add("highSaturation");
    });
}
