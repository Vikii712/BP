document.addEventListener('DOMContentLoaded', function () {

    // Pre každý formulár, ktorý má triedu js-validate
    document.querySelectorAll('.js-validate').forEach(function (form) {

        console.log("nacitalo ma")
        const fields = form.querySelectorAll('.validate-field');

        function validateField(field) {
            if (field.value.trim() === '') {
                field.classList.remove('border-gray-300');
                field.classList.add('border-red-500', 'bg-red-50');
                return false;
            } else {
                field.classList.remove('border-red-500', 'bg-red-50');
                field.classList.add('border-gray-300');
                return true;
            }
        }

        // Live kontrola pri písaní
        fields.forEach(function (field) {
            field.addEventListener('input', function () {
                validateField(field);
            });
        });

        // Kontrola pri submit
        form.addEventListener('submit', function (e) {

            let firstInvalid = null;
            let isValid = true;

            fields.forEach(function (field) {
                if (!validateField(field)) {
                    isValid = false;
                    if (!firstInvalid) {
                        firstInvalid = field;
                    }
                }
            });

            if (!isValid) {
                e.preventDefault();

                firstInvalid.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                firstInvalid.focus();
            }
        });

    });

});
