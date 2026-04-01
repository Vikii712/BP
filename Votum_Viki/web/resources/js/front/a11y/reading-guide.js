let readingGuideMove = null;

window.readingGuide = function(active){

    const guide = document.getElementById("readingGuide");
    if(!guide) return;

    guide.classList.toggle("hidden", !active);

    if(active){

        readingGuideMove = (e) => {
            guide.style.top = e.clientY + "px";
        };

        document.addEventListener("mousemove", readingGuideMove);

    } else {

        document.removeEventListener("mousemove", readingGuideMove);

    }
}
