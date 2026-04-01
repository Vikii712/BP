let isSpeaking = false;
let currentUtterance = null;
let currentActiveId = null;

function getVoiceByLocale(locale) {
    const voices = speechSynthesis.getVoices();

    if (locale === 'en') {
        return voices.find(v => v.lang.startsWith("en")) || null;
    }

    // default slovenčina
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
    const locale = window.appLocale || 'sk';
    const voice = getVoiceByLocale(locale);

    const utter = new SpeechSynthesisUtterance(text);

    utter.lang = locale === 'en' ? "en-US" : "sk-SK";

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

speechSynthesis.onvoiceschanged = () => {
    console.log("Voices loaded:", speechSynthesis.getVoices());
};

window.toggleListen = function(text, id) {
    if (!text || text.trim().length === 0) return;

    // Extrahujeme plain text – funguje aj pre HTML aj pre čistý text
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = text;
    const plainText = tempDiv.textContent || tempDiv.innerText || '';

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
    speak(plainText, id);
}
