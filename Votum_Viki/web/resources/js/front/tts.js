let isSpeaking = false;
let currentUtterance = null;
let currentActiveId = null;

function getVoiceByLocale(locale) {
    const voices = speechSynthesis.getVoices();

    if (locale === 'en') {
        return voices.find(v => v.lang.startsWith("en")) || null;
    }

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
    const locale = document.body.dataset.locale || 'sk';
    const voice = getVoiceByLocale(locale);

    const utter = new SpeechSynthesisUtterance(text);
    utter.lang = locale === 'en' ? "en-US" : "sk-SK";

    if (voice) {
        utter.voice = voice;
    }

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

window.toggleListen = function (text, id) {
    if (!text || text.trim().length === 0) return;

    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = text;
    const plainText = tempDiv.textContent || tempDiv.innerText || '';

    if (isSpeaking && currentActiveId === id) {
        speechSynthesis.cancel();
        isSpeaking = false;
        updateIcon(id, false);
        currentActiveId = null;
        return;
    }

    speechSynthesis.cancel();
    resetAllIcons();

    isSpeaking = true;
    currentActiveId = id;

    updateIcon(id, true);
    speak(plainText, id);
};

document.addEventListener('click', function (e) {
    const button = e.target.closest('[data-tts-button]');
    if (!button) return;

    const text = JSON.parse(button.dataset.ttsText);
    const id = button.dataset.ttsId;

    window.toggleListen(text, id);
});
