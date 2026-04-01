document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.info-icon').forEach(function(icon) {
        const msg = icon.parentElement.querySelector('.info-message');
        icon.addEventListener('mouseenter', () => msg.classList.remove('hidden'));
        icon.addEventListener('mouseleave', () => msg.classList.add('hidden'));
    });
});
