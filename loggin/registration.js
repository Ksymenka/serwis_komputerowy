const rejestracja = document.getElementById("rejestracja");
let imie = document.getElementById("imie");
let nazwisko = document.getElementById("nazwisko");
let nr_tel = document.getElementById("nr_tel");
let email = document.getElementById("email");
let password = document.getElementById("password");
let repeatPassword = document.getElementById("repeatPassword");
let elements = [imie, nazwisko, nr_tel, email, password, repeatPassword];

function isEmpty(string) {
    string = string.trim();
    if (string === "" || string.lenght === 0) {
        return false;
    }
    return true;
}

rejestracja.onsubmit = (event) => {
    elements.forEach(element => {
        if (isEmpty(element.value)) {
            document.getElementById("err").innerHTML = `Proszę podać wszystkie elementy`;
            event.preventDefault();
        }
        
        if (password.value !== repeatPassword.value) {
            event.preventDefault();
            document.getElementById("err").innerHTML = `Hasła nie są takie same`;
        }
        
        if (!email.value.includes("@")) {
            document.getElementById("err").innerHTML = `Proszę podać poprawny mail`;
        } 
    });    
}
 