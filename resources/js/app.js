import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// Funzione per verificare se il valore è un numero float valido compreso tra min e max
function isValidFloat(value, min, max) {
    const floatValue = parseFloat(value);
    return !isNaN(floatValue) && floatValue >= min && floatValue <= max;
}


// Attendi il caricamento completo del documento
document.addEventListener('DOMContentLoaded', function () {
    // Seleziona tutti i moduli che devono essere validati
    const formsToValidate = document.querySelectorAll('form[id="registrationForm"], form[id="updateForm"], form[id="storeForm"]');

    // Aggiungi un ascoltatore agli eventi di submit dei moduli
    formsToValidate.forEach(function (form) {
        form.addEventListener('submit', handleFormSubmission);

    });

});


// Definizione di una funzione per la gestione degli eventi di validazione
function handleFormSubmission(event) {
    event.preventDefault();
    const formId = this.getAttribute('id');
    const errorDiv = document.getElementById(`${formId}-errors`);
    if (!errorDiv) {
        console.error(`Element with id ${formId}-errors not found.`);
        return;
    }
    errorDiv.innerHTML = '';

    console.log(formId);
    console.log(errorDiv);

    // Logica di validazione del modulo

    // REGISTRAZIONE

    if (formId === 'registrationForm') {

        let nameValue = this.elements['name'].value.trim();

        if (nameValue === '') {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il Nome è obbligatiorio');


        }

        if (nameValue.length > 100) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Nome e cognome non possono essere più lunghi di 100 caratteri.')


        }

        if (nameValue.length < 10) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Nome e cognome non possono devono contenere almeno 10 caratteri.')


        }

        // Effettua la validazione dei campi del modulo
        let mailValue = this.elements['email'].value.trim();

        if (mailValue === '') {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'L\'Email è obbligatoria.');


        }

        if (!mailValue.includes('@')) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Inserisci un indirizzo mail valido.');


        }

        if (mailValue.length > 100) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'L\'indirizzo email non può contenere più di 100 caratteri.')


        }

        if (mailValue.length < 10) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'L\'indirizzo email deve contenere almeno 10 caratteri.')


        }

        // Effettua la validazione dei campi del modulo
        let passValue = this.elements['password'].value.trim();

        if (passValue === '') {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La password è obbligatioria.');


        }

        if (passValue.length < 8) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La password deve essere lunga almeno 8 caratteri.')


        }

        // Effettua la validazione dei campi del modulo
        let confirmValue = this.elements['password_confirmation'].value.trim();

        if (confirmValue === '') {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La conferma della password è obbligatioria.');


        }

        if (confirmValue !== passValue) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Le password non corrispondono.')


        }

        // Effettua la validazione dei campi del modulo
        let restnameValue = this.elements['restaurantName'].value.trim();

        if (restnameValue === '') {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il nome del ristorante è obbligatiorio.');


        }

        if (restnameValue.length < 5) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il nome del ristorante deve contenere almeno 5 caratteri')


        }

        if (restnameValue.length > 50) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il nome del ristorante non può contenere più di 50 caratteri')


        }

        // Effettua la validazione dei campi del modulo
        let ivaValue = this.elements['p_iva'].value.trim();

        if (ivaValue === '') {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La partita IVA è obbligatoria');


        }

        if (ivaValue.length != 11) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La partita IVA deve contenere 11 caratteri esatti')


        }

        // Effettua la validazione dei campi del modulo
        let addressValue = this.elements['address'].value.trim();

        if (addressValue === '') {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'L\'indirizzo del ristorante è obbligatorio');


        }

        if (addressValue.length < 8) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'L\'indirizzo del ristorante deve contenere almeno 8 caratteri')


        }

        if (addressValue.length > 100) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'L\'indirizzo del ristorante può contenere massimo 100 caratteri')


        }

        // Effettua la validazione dei campi del modulo
        let imgValue = this.elements['cover_image'];
        let file = imgValue.files[0]

        if (!file) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'L\'immagine di copertina è obbligatoria');


        }

        // Verifica il tipo di file
        let allowedTypes = ['image/jpeg', 'image/png']; // Formati accettati
        if (!allowedTypes.includes(file.type)) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Scegli un file di tipo immagine (JPEG, PNG).');


        }

        // Verifica la dimensione del file
        let maxSizeMB = 2; // Dimensione massima del file consentita in MB
        let maxSizeBytes = maxSizeMB * 1024 * 1024; // Converti MB in bytes
        if (file.size > maxSizeBytes) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il file selezionato è troppo grande.');


        }

        // Effettua la validazione dei campi del modulo
        let checkboxes = document.querySelectorAll('.accordion-content input[type="checkbox"]');
        let atLeastOneSelected = Array.from(checkboxes).some(function (checkbox) {
            return checkbox.checked;
        });

        if (!atLeastOneSelected) {

            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Seleziona almeno una tipologia per il tuo ristorante');


        }



    }



    // STORE

    if (formId === 'storeForm') {

        let nameValue = this.elements['name'].value.trim();
        if (nameValue === '') {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il Nome del piatto è obbligatiorio');
        }

        if (nameValue.length > 50) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Nome non puo essere piu lungho di 50 caratteri.')
        }

        if (nameValue.length < 3) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Nome non puo essere piu corto di 3 caratteri.')
        }
        // Effettua la validazione dei campi del modulo
        let descriptionValue = this.elements['description'].value.trim();
        if (descriptionValue === '') {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La descrizione del piatto è obbligatiorio');

        }

        if (descriptionValue.length > 255) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La descrizione non puo essere piu lungho di 255 caratteri.')

        }

        if (descriptionValue.length < 100) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La descrizione non puo essere piu corto di 10 caratteri.')

        }

        let priceValue = this.elements['price'].value.trim();

        if (priceValue === '') {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il prezzo del piatto è obbligatiorio');

        }

        if (!isValidFloat(priceValue, 0, 99.99)) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il prezzo deve essere un numero compreso tra 0 e 99.99');
        }

        let imgValue = this.elements['cover_image'];
        let file = imgValue.files[0]


        // Verifica se è stato selezionato un file
        if (file) {
            // Verifica il tipo di file solo se è stato selezionato un file
            let allowedTypes = ['image/jpeg', 'image/png']; // Formati accettati
            if (!allowedTypes.includes(file.type)) {
                // Visualizza un messaggio di errore
                addErrorMessage(formId, 'Scegli un file di tipo immagine (JPEG, PNG).');
            }

            // Verifica la dimensione del file solo se è stato selezionato un file
            let maxSizeMB = 2; // Dimensione massima del file consentita in MB
            let maxSizeBytes = maxSizeMB * 1024 * 1024; // Converti MB in bytes
            if (file.size > maxSizeBytes) {
                // Visualizza un messaggio di errore
                addErrorMessage(formId, 'Il file selezionato è troppo grande.');
            }
        }

    }


    // EDIT

    if (formId === 'updateForm') {

        let nameValue = this.elements['name'].value.trim();

        if (nameValue === '') {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il Nome del piatto è obbligatiorio');
        }

        if (nameValue.length > 50) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Nome non puo essere piu lungho di 50 caratteri.')
        }

        if (nameValue.length < 3) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Nome non puo essere piu corto di 3 caratteri.')

        }
        // Effettua la validazione dei campi del modulo

        let descriptionValue = this.elements['description'].value.trim();

        if (descriptionValue === '') {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La descrizione del piatto è obbligatiorio');

        }

        if (descriptionValue.length > 255) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La descrizione non puo essere piu lungho di 255 caratteri.')

        }

        if (descriptionValue.length < 100) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'La descrizione non puo essere piu corto di 10 caratteri.')

        }

        let priceValue = this.elements['price'].value.trim();

        if (priceValue === '') {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il prezzo del piatto è obbligatiorio');

        }

        if (!isValidFloat(priceValue, 0, 99.99)) {
            // Visualizza un messaggio di errore
            addErrorMessage(formId, 'Il prezzo deve essere un numero compreso tra 0 e 99.99');
        }

        let imgValue = this.elements['cover_image'];
        let file = imgValue.files[0]


        // Verifica se è stato selezionato un file
        if (file) {
            // Verifica il tipo di file solo se è stato selezionato un file
            let allowedTypes = ['image/jpeg', 'image/png']; // Formati accettati
            if (!allowedTypes.includes(file.type)) {
                // Visualizza un messaggio di errore
                addErrorMessage(formId, 'Scegli un file di tipo immagine (JPEG, PNG).');
            }

            // Verifica la dimensione del file solo se è stato selezionato un file
            let maxSizeMB = 2; // Dimensione massima del file consentita in MB
            let maxSizeBytes = maxSizeMB * 1024 * 1024; // Converti MB in bytes
            if (file.size > maxSizeBytes) {
                // Visualizza un messaggio di errore
                addErrorMessage(formId, 'Il file selezionato è troppo grande.');
            }
        }

    }


    console.log(errorDiv);
    // Invia il modulo se non ci sono errori
    if (errorDiv.children.length === 0) {
        this.submit();
    }

}

// Aggiungi un ascoltatore agli eventi di submit dei moduli

document.getElementById('registrationForm').addEventListener('submit', handleFormSubmission);
document.getElementById('updateForm').addEventListener('submit', handleFormSubmission);
document.getElementById('storeForm').addEventListener('submit', handleFormSubmission);

function addErrorMessage(formId, message) {
    const errorDiv = document.getElementById(`${formId}-errors`);
    if (!errorDiv) {
        console.error(`Element with id ${formId}-errors not found.`);
        return;
    }
    const errorMessage = document.createElement('div');
    errorMessage.textContent = message;
    errorDiv.appendChild(errorMessage);
}




