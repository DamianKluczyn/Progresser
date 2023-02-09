const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');
const passwordInput = form.querySelector('input[name="password"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function isPassword(password) {
    return /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}/.test(password)
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

passwordInput.addEventListener('')
