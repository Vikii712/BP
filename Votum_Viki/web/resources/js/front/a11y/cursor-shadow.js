let cursorShadowMove = null;

window.cursorShadow = function(active){

    const topShadow = document.getElementById("cursorShadowTop");
    const bottomShadow = document.getElementById("cursorShadowBottom");

    topShadow.classList.toggle("hidden", !active);
    bottomShadow.classList.toggle("hidden", !active);

    const gap = 100;

    if(active){

        cursorShadowMove = (e) => {

            const y = e.clientY;
            const screenHeight = window.innerHeight;

            const topHeight = Math.max(0, y - gap/2);
            const bottomHeight = Math.max(0, screenHeight - (y + gap/2));

            topShadow.style.height = topHeight + "px";

            bottomShadow.style.height = bottomHeight + "px";
            bottomShadow.style.top = (y + gap/2) + "px";
        };

        document.addEventListener("mousemove", cursorShadowMove);

    } else {

        document.removeEventListener("mousemove", cursorShadowMove);

    }

}
