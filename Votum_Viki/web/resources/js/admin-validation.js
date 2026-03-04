document.addEventListener('DOMContentLoaded', function () {

    function validateField(field) {
        if (field.value.trim() === '') {
            field.style.borderColor = '#ef4444';
            field.style.backgroundColor = '#fef2f2';
            return false;
        } else {
            field.style.borderColor = '';
            field.style.backgroundColor = '';
            return true;
        }
    }

    document.querySelectorAll('.js-validate').forEach(function (form) {

        // Live validácia cez event delegation - funguje aj pre dynamicky pridané polia
        form.addEventListener('input', function (e) {
            if (e.target.classList.contains('validate-field')) {
                validateField(e.target);
            }
        });

        // Validácia pri submit
        form.addEventListener('submit', function (e) {
            // Dotaz vždy znova - zachytí aj dynamicky pridané polia
            const fields = form.querySelectorAll('.validate-field:not([style*="display: none"])');

            let firstInvalid = null;
            let isValid = true;

            fields.forEach(function (field) {
                // Preskočiť polia v skrytých sekciách (markForDelete)
                if (field.closest('[style*="display: none"]')) return;

                if (!validateField(field)) {
                    isValid = false;
                    if (!firstInvalid) firstInvalid = field;
                }
            });

            if (!isValid) {
                e.preventDefault();
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalid.focus();
            }
        });
    });
});
