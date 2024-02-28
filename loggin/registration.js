const registration = document.getElementById("rejestracja");
let inputs = document.querySelectorAll('input');


function isEmpty(element) {
    return element && element.value.trim() === "";
}

function setErrorMessage(message) {
    document.getElementById("err").innerHTML = `${message}`;
}

function validatePhoneNumber(phoneNumber) {
    // Wyrażenie regularne dla akceptowalnego formatu numeru telefonu
    const phoneRegex = /^(\+\d{1,2}\s?)?(\(\d{3}\)|\d{3})([-.\s]?)\d{3}([-.\s]?)\d{4}$/;
    return phoneRegex.test(phoneNumber);
}


registration.onsubmit = (event) => {
   inputs.forEach(input => {
   console.log(input);
        if(isEmpty(input.value)) {
            event.preventDefault();
            setErrorMessage("Proszę wypełnić wszysktie pola");
        }
        if(inputs[5].value !== inputs[6].value) {
            event.preventDefault();
            setErrorMessage("Hasła się nie zgadzają");
        }
        if (validatePhoneNumber(inputs[4].value)) {
           event.preventDefault();
           setErrorMessage("Prosze podać poprawny numer telefonu"); 
        }
   }); 
};
