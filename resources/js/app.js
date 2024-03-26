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
    document.getElementById('form-errors').innerHTML = '';

    // Effettua la validazione dei campi del modulo

    let nameValue = this.elements['name'].value.trim();

    if (nameValue === '') {

        // Visualizza un messaggio di errore
        addErrorMessage('Il Nome è obbligatiorio');


    }

    if (nameValue.length > 100) {

        // Visualizza un messaggio di errore
        addErrorMessage('Nome e cognome non possono essere più lunghi di 100 caratteri.')


    }

    if (nameValue.length < 10) {

        // Visualizza un messaggio di errore
        addErrorMessage('Nome e cognome non possono devono contenere almeno 10 caratteri.')


    }

    // Effettua la validazione dei campi del modulo
    let mailValue = this.elements['email'].value.trim();

    if (mailValue === '') {

        // Visualizza un messaggio di errore
        addErrorMessage('L\'Email è obbligatoria.');


    }

    if (!mailValue.includes('@')) {

        // Visualizza un messaggio di errore
        addErrorMessage('Inserisci un indirizzo mail valido.');


    }

    if (mailValue.length > 100) {

        // Visualizza un messaggio di errore
        addErrorMessage('L\'indirizzo email non può contenere più di 100 caratteri.')


    }

    if (mailValue.length < 10) {

        // Visualizza un messaggio di errore
        addErrorMessage('L\'indirizzo email deve contenere almeno 10 caratteri.')


    }

    // Effettua la validazione dei campi del modulo
    let passValue = this.elements['password'].value.trim();

    if (passValue === '') {

        // Visualizza un messaggio di errore
        addErrorMessage('La password è obbligatioria.');


    }

    if (passValue.length < 8) {

        // Visualizza un messaggio di errore
        addErrorMessage('La password deve essere lunga almeno 8 caratteri.')


    }

    // Effettua la validazione dei campi del modulo
    let confirmValue = this.elements['password_confirmation'].value.trim();

    if (confirmValue === '') {

        // Visualizza un messaggio di errore
        addErrorMessage('La conferma della password è obbligatioria.');


    }

    if (confirmValue !== passValue) {

        // Visualizza un messaggio di errore
        addErrorMessage('Le password non corrispondono.')


    }

    // Effettua la validazione dei campi del modulo
    let restnameValue = this.elements['restaurantName'].value.trim();

    if (restnameValue === '') {

        // Visualizza un messaggio di errore
        addErrorMessage('Il nome del ristorante è obbligatiorio.');


    }

    if (restnameValue.length < 5) {

        // Visualizza un messaggio di errore
        addErrorMessage('Il nome del ristorante deve contenere almeno 5 caratteri')


    }

    if (restnameValue.length > 50) {

        // Visualizza un messaggio di errore
        addErrorMessage('Il nome del ristorante non può contenere più di 50 caratteri')


    }

    // Effettua la validazione dei campi del modulo
    let ivaValue = this.elements['p_iva'].value.trim();

    if (ivaValue === '') {

        // Visualizza un messaggio di errore
        addErrorMessage('La partita IVA è obbligatoria');


    }

    if (ivaValue.length != 11) {

        // Visualizza un messaggio di errore
        addErrorMessage('La partita IVA deve contenere 11 caratteri esatti')


    }

    // Effettua la validazione dei campi del modulo
    let addressValue = this.elements['address'].value.trim();

    if (addressValue === '') {

        // Visualizza un messaggio di errore
        addErrorMessage('L\'indirizzo del ristorante è obbligatorio');


    }

    if (addressValue.length < 8) {

        // Visualizza un messaggio di errore
        addErrorMessage('L\'indirizzo del ristorante deve contenere almeno 8 caratteri')


    }

    if (addressValue.length > 100) {

        // Visualizza un messaggio di errore
        addErrorMessage('L\'indirizzo del ristorante può contenere massimo 100 caratteri')


    }

    // Effettua la validazione dei campi del modulo
    let imgValue = this.elements['cover_image'];
    let file = imgValue.files[0]

    if (!file) {

        // Visualizza un messaggio di errore
        addErrorMessage('L\'immagine di copertina è obbligatoria');


    }

    // Verifica il tipo di file
    let allowedTypes = ['image/jpeg', 'image/png']; // Formati accettati
    if (!allowedTypes.includes(file.type)) {

        // Visualizza un messaggio di errore
        addErrorMessage('Scegli un file di tipo immagine (JPEG, PNG).');


    }

    // Verifica la dimensione del file
    let maxSizeMB = 2; // Dimensione massima del file consentita in MB
    let maxSizeBytes = maxSizeMB * 1024 * 1024; // Converti MB in bytes
    if (file.size > maxSizeBytes) {

        // Visualizza un messaggio di errore
        addErrorMessage('Il file selezionato è troppo grande.');


    }

    // Effettua la validazione dei campi del modulo
    let checkboxes = document.querySelectorAll('.accordion-content input[type="checkbox"]');
    let atLeastOneSelected = Array.from(checkboxes).some(function (checkbox) {
        return checkbox.checked;
    });

    if (!atLeastOneSelected) {

        // Visualizza un messaggio di errore
        addErrorMessage('Seleziona almeno una tipologia per il tuo ristorante');


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

