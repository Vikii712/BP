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


let isSpeaking = false;
let currentUtterance = null;
let currentActiveId = null;


function getSlovakVoice() {
    const voices = speechSynthesis.getVoices();
    return voices.find(v => v.lang === "sk-SK") || null;
}

function resetAllIcons() {
    document.querySelectorAll('[id^="ttsIcon"]').forEach(icon => {
        icon.classList.remove("fa-stop");
        icon.classList.add("fa-volume-up");
    });
}

function updateIcon(id, speaking) {
    const icon = document.getElementById('ttsIcon' + id);
    if (!icon) return;

    if (speaking) {
        icon.classList.remove("fa-volume-up");
        icon.classList.add("fa-stop");
    } else {
        icon.classList.remove("fa-stop");
        icon.classList.add("fa-volume-up");
    }
}

function speak(text, id) {
    const voice = getSlovakVoice();
    const utter = new SpeechSynthesisUtterance(text);

    utter.lang = "sk-SK";
    if (voice) utter.voice = voice;
    utter.rate = 1;
    utter.pitch = 1;
    utter.volume = 1;

    utter.onend = () => {
        isSpeaking = false;
        currentUtterance = null;
        updateIcon(id, false);
        currentActiveId = null;
    };

    speechSynthesis.cancel();
    currentUtterance = utter;
    speechSynthesis.speak(utter);
}

function toggleListen(text, id) {
    if (!text || text.trim().length === 0) return;

    // Ak už hovoríme a klikneme na to isté ID → stop
    if (isSpeaking && currentActiveId === id) {
        speechSynthesis.cancel();
        isSpeaking = false;
        updateIcon(id, false);
        currentActiveId = null;
        return;
    }

    // Ak práve hrá iný → vypni ho a resetuj ikony
    speechSynthesis.cancel();
    resetAllIcons();

    isSpeaking = true;
    currentActiveId = id;

    updateIcon(id, true);
    speak(text, id);
}
