const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(
        function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1);
}


function samePassword() {
    setTimeout(
        function () {
            const condition = (arePasswordsSame(
                confirmedPasswordInput.previousElementSibling.value,
                confirmedPasswordInput.value)) },
        1);
}

emailInput.addEventListener('keyup', validateEmail);

confirmedPasswordInput.addEventListener('keyup', samePassword);

