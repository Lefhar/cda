/**
 * déclaration des constantes et attribution des valeurs par les input séléctionné par l'id
 * @type {HTMLElement}
 */

const sujet = document.getElementById('sujet');
const to = document.getElementById('to');
const message = document.getElementById('message');

/**
 * regex pour vérifier que l'adresse email est correctement formé
 * @type {RegExp}
 */
const regexmail 	= /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/
/**
 * se déclenche dès que l'on commence à saisir dans l'input sujet
 */
sujet.addEventListener("keyup", event => {
    if (event.target.value.length < 5) {
        document.getElementById('Esujet').innerHTML = "Veuillez entrer plus de 5 caractéres"

    } else {
        document.getElementById('Esujet').style = "display:none"
    }
});

/**
 * se déclenche dès que l'on commence à saisir dans textarea message
 */
message.addEventListener("keyup", event => {
    if (event.target.value.length < 5) {
        document.getElementById('Emessage').innerHTML = "Veuillez entrer plus de 5 caractéres"

    } else {
        document.getElementById('Emessage').style = "display:none"
    }
});

/**
 * se déclenche dès que l'on commence à saisir dans l'input email
 */
to.addEventListener("keyup", event => {
    if (event.target.value.match(regexmail)) {
        document.getElementById('Eemail').style = "display:none"
    } else {
        document.getElementById('Eemail').innerHTML = "Veuillez entrer une adresse email correct"
    }

});