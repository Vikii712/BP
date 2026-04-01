document.addEventListener('DOMContentLoaded', () => {
    const roots = document.querySelectorAll('[data-tabs-root]');

    roots.forEach(root => {
        const buttons = root.querySelectorAll('[data-tab-button]');
        const panels = root.querySelectorAll('[data-tab-panel]');

        function activateTab(tabName) {
            buttons.forEach(button => {
                const isActive = button.dataset.tabButton === tabName;

                button.setAttribute('aria-selected', isActive ? 'true' : 'false');

                button.classList.toggle('bg-dark-votum2', isActive);
                button.classList.toggle('text-white', isActive);
                button.classList.toggle('font-bold', isActive);
                button.classList.toggle('shadow', isActive);

                button.classList.toggle('bg-white', !isActive);
                button.classList.toggle('text-votum-blue', !isActive);
                button.classList.toggle('border', !isActive);
                button.classList.toggle('border-votum-blue', !isActive);
                button.classList.toggle('font-semibold', !isActive);
            });

            panels.forEach(panel => {
                panel.classList.toggle('hidden', panel.dataset.tabPanel !== tabName);
            });
        }

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                activateTab(button.dataset.tabButton);
            });
        });
    });
});
