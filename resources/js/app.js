import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// Aggiungi un ascoltatore agli eventi di submit del modulo
document.forms['registrationForm'].addEventListener('submit', function (event) {
    // Prevenire il comportamento predefinito dell'evento di invio del modulo
    event.preventDefault();

    // Pulisci i messaggi di errore precedenti
    document.getElementById('registration-errors').innerHTML = '';

    // Effettua la validazione dei campi del modulo

    let nameValue = this.elements['name'].value.trim();

    if (nameValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('Il Nome è obbligatiorio');
        // Impedi l'invio del modulo
        return false;
    }

    if (nameValue.length > 100) {
        // Visualizza un messaggio di errore
        addErrorMessage('Nome e cognome non possono essere più lunghi di 100 caratteri.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let mailValue = this.elements['email'].value.trim();

    if (mailValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('L\'Email è obbligatoria.');
        // Impedi l'invio del modulo
        return false;
    }

    if (!mailValue.includes('@')) {
        // Visualizza un messaggio di errore
        addErrorMessage('Inserisci un indirizzo mail valido.');
        // Impedi l'invio del modulo
        return false;
    }

    if (mailValue.length > 100) {
        // Visualizza un messaggio di errore
        addErrorMessage('L\'indirizzo email non può essere più lungo di 100 caratteri.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let passValue = this.elements['password'].value.trim();

    if (passValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('La password è obbligatioria.');
        // Impedi l'invio del modulo
        return false;
    }

    if (passValue.length < 8) {
        // Visualizza un messaggio di errore
        addErrorMessage('La password deve essere lunga almeno 8 caratteri.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let confirmValue = this.elements['password_confirmation'].value.trim();

    if (confirmValue !== passValue) {
        // Visualizza un messaggio di errore
        addErrorMessage('Le password non corrispondono.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let restnameValue = this.elements['inputname'].value.trim();

    // Effettua la validazione dei campi del modulo
    let ivaValue = this.elements['inputname'].value.trim();

    // Effettua la validazione dei campi del modulo
    let addressValue = this.elements['inputname'].value.trim();

    // Effettua la validazione dei campi del modulo
    let imgValue = this.elements['inputname'];
    let file = imgValue.files[0]

    // Effettua la validazione dei campi del modulo
    let typeValue = this.elements['inputname'].value.trim();

    // Esempio di validazione: campo vuoto
    if (inputValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('Inserisci un indirizzo email valido.');
        // Impedi l'invio del modulo
        return false;
    }

    // Invia il modulo se non ci sono errori
    if (document.getElementById('registration-errors').children.length === 0) {
        this.submit();
    }

});

function addErrorMessage(message) {
    let errorDiv = document.getElementById('form-errors');
    let errorMessage = document.createElement('div');
    errorMessage.textContent = message;
    errorDiv.appendChild(errorMessage);
}

document.forms['storeForm'].addEventListener('submit', function (event) {
    // Prevenire il comportamento predefinito dell'evento di invio del modulo
    event.preventDefault();

    // Pulisci i messaggi di errore precedenti
    document.getElementById('form-errors').innerHTML = '';

    // Effettua la validazione dei campi del modulo

    let nameValue = this.elements['name'].value.trim();

    if (nameValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('Il Nome del piatto è obbligatiorio');
        // Impedi l'invio del modulo
        return false;
    }

    if (nameValue.length > 100) {
        // Visualizza un messaggio di errore
        addErrorMessage('Nome e cognome non possono essere più lunghi di 100 caratteri.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let mailValue = this.elements['email'].value.trim();

    if (mailValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('L\'Email è obbligatoria.');
        // Impedi l'invio del modulo
        return false;
    }

    if (!mailValue.includes('@')) {
        // Visualizza un messaggio di errore
        addErrorMessage('Inserisci un indirizzo mail valido.');
        // Impedi l'invio del modulo
        return false;
    }

    if (mailValue.length > 100) {
        // Visualizza un messaggio di errore
        addErrorMessage('L\'indirizzo email non può essere più lungo di 100 caratteri.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let passValue = this.elements['password'].value.trim();

    if (passValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('La password è obbligatioria.');
        // Impedi l'invio del modulo
        return false;
    }

    if (passValue.length < 8) {
        // Visualizza un messaggio di errore
        addErrorMessage('La password deve essere lunga almeno 8 caratteri.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let confirmValue = this.elements['password_confirmation'].value.trim();

    if (confirmValue !== passValue) {
        // Visualizza un messaggio di errore
        addErrorMessage('Le password non corrispondono.')
        // Impedi l'invio del modulo
        return false;
    }

    // Effettua la validazione dei campi del modulo
    let restnameValue = this.elements['inputname'].value.trim();

    // Effettua la validazione dei campi del modulo
    let ivaValue = this.elements['inputname'].value.trim();

    // Effettua la validazione dei campi del modulo
    let addressValue = this.elements['inputname'].value.trim();

    // Effettua la validazione dei campi del modulo
    let imgValue = this.elements['inputname'];
    let file = imgValue.files[0]

    // Effettua la validazione dei campi del modulo
    let typeValue = this.elements['inputname'].value.trim();

    // Esempio di validazione: campo vuoto
    if (inputValue === '') {
        // Visualizza un messaggio di errore
        addErrorMessage('Inserisci un indirizzo email valido.');
        // Impedi l'invio del modulo
        return false;
    }

    // Invia il modulo se non ci sono errori
    if (document.getElementById('registration-errors').children.length === 0) {
        this.submit();
    }

});
