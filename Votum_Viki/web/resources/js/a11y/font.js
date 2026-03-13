
document.addEventListener('DOMContentLoaded', () => {
    const savedKey = localStorage.getItem('a11y_font') || 'atkinson';

    if (savedKey) {
        const radio = document.querySelector(`input[data-font-key="${savedKey}"]`);
        if (radio) {
            radio.checked = true;
            document.body.style.fontFamily = radio.dataset.font;
        }
    }

    document.querySelectorAll('input[name="a11y-font"]').forEach(radio => {
        radio.addEventListener('change', () => {
            document.body.style.fontFamily = radio.dataset.font;
            localStorage.setItem('a11y_font', radio.dataset.fontKey);
        });
    });
});
