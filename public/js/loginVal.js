// public/js/loginVal.js

document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            validateLoginForm();
        });
    }

    function validateLoginForm() {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        const errorsContainer = document.getElementById('validationErrors');
        errorsContainer.innerHTML = '';

        const errors = {};

        if (!emailInput.value.trim()) {
            errors.email = 'El campo de correo electrónico es obligatorio.';
        } else if (!emailInput.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
            errors.email = 'Ingresa un correo electrónico válido.';
        }

        if (!passwordInput.value.trim()) {
            errors.password = 'El campo de contraseña es obligatorio.';
        } else if (passwordInput.value.length < 5) {
            errors.password = 'Debes escribir al menos 5 caracteres en la contraseña.';
        }

        if (Object.keys(errors).length === 0) {
            loginForm.submit();
        } else {
            for (const error in errors) {
                const errorElement = document.createElement('p');
                errorElement.innerText = errors[error];
                errorsContainer.appendChild(errorElement);
            }
        }
    }
});
