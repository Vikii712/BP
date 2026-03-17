import './bootstrap';
import './a11y/active.js';
import './admin-validation.js';
import './a11y/a11y-storage.js';
import './a11y/reading-guide.js';
import './a11y/cursor-shadow.js';
import './a11y/highlighter.js';
import './a11y/spacing.js';
import './a11y/cursor.js';
import './a11y/obrazky.js';
import './a11y/filtre.js';
import './a11y/size.js';
import './a11y/reset.js';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.copyToClipboard = function (text) {
    navigator.clipboard.writeText(text).then(() => {
        showCopyNotification('Skopírované!');
    }).catch(err => {
        console.error('Nepodarilo sa skopírovať text: ', err);
    });
};

function showCopyNotification(message) {
    const notif = document.createElement('div');
    notif.textContent = message;
    notif.className = `
         fixed bottom-[50px] left-1/2 transform -translate-x-1/2
        bg-green-700 text-white text-lg font-semibold
        py-3 px-8 rounded-full shadow-lg
        opacity-0 animate-fadeInOut z-50
    `;
    document.body.appendChild(notif);

    // zmizne po 2 sekundách
    setTimeout(() => notif.remove(), 2000);
}

document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleAddFormBtn');
    const addForm = document.getElementById('addFormWrapper');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            addForm.classList.toggle('hidden');
        });
    }
});
