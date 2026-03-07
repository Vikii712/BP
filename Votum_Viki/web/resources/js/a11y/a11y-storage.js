document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".a11y-toggle").forEach(input => {

        const feature = input.dataset.feature;

        const saved = localStorage.getItem(feature) === "true";
        input.checked = saved;

        if(saved){
            window[feature]?.(true);
        }

        input.addEventListener("change", () => {

            localStorage.setItem(feature, input.checked);
            window[feature]?.(input.checked);

        });

    });

});
