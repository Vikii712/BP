document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleAddFormBtn');
    const addForm = document.getElementById('addFormWrapper');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            addForm.classList.toggle('hidden');
        });
    }
});
