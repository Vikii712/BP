window.bigCursor = function(active) {
    if (active) {
        document.body.classList.add("big-cursor");

        const cursor = document.createElement('div');
        cursor.id = 'big-cursor-el';
        document.body.appendChild(cursor);

        document.addEventListener('mousemove', trackCursor);
    } else {
        document.body.classList.remove("big-cursor");
        document.getElementById('big-cursor-el')?.remove();
        document.removeEventListener('mousemove', trackCursor);
    }
};

function trackCursor(e) {
    const el = document.getElementById('big-cursor-el');
    if (el) {
        el.style.left = e.clientX + 'px';
        el.style.top = e.clientY + 'px';
    }
}
