const rejestracja = document.getElementById("rejestracja");
let imie = document.getElementById("imie");
let nazwisko = document.getElementById("nazwisko");
let nr_tel = document.getElementById("nr_tel");
let email = document.getElementById("email");
let password = document.getElementById("password");
let repeatPassword = document.getElementById("repeatPassword");
let elements = [imie, nazwisko, nr_tel, email, password, repeatPassword];

function isEmpty(element) {
    if (element.value.trim() === "") {
        return false;
    }
    return true;
}

function setErrorMessage(message) {
    document.getElementById("err").innerHTML = `${message}`;
}

rejestracja.onsubmit = (event) => {
    elements.forEach(element => {
        if (isEmpty(element.value)) {
            console.log(element.value);
            event.preventDefault();
            setErrorMessage("Proszę podać wszystkie elementy")
        }
        
        if (password.value !== repeatPassword.value) {
            event.preventDefault();
            setErrorMessage("Hasła nie są takie same");
        }
        
        if (!email.value.includes("@")) {
            event.preventDefault();
            setErrorMessage("Podany błędny mail");
        } 
    });    
}
 