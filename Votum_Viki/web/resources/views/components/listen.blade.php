@props(['text' => 'ahoj' , 'id' => 1])

<button
    onclick="toggleListen({{ json_encode($text) }}, '{{ $id }}')"
    class="absolute -top-6 right-0 bg-votum-blue text-white w-16 h-16 rounded-full
           flex items-center justify-center txt-btn-block
           shadow-lg z-10"
    title="Počúvať text">
    <i id="ttsIcon{{ $id }}" class="fas fa-volume-up text-xl"></i>
</button>

<script>
    let isSpeaking = false;
    let currentUtterance = null;
    let currentActiveId = null;

    window.speechSynthesis.onvoiceschanged = () => {
        console.log("Hlasy načítané:");
        speechSynthesis.getVoices().forEach(v => console.log(v.name, v.lang));
    };

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
</script>
