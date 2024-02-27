const logowanie = document.getElementById("logowanie");
let login = document.getElementById("login");
let haslo = document.getElementById("haslo");

function isEmpty(string) {
    string = string.trim();
    if (string === "" || string.lenght === 0) {
        return false;
    }
    return true;
}

logowanie.onsubmit = (event) => {
    if (isEmpty(login.value) || isEmpty(haslo.value)) {
        event.preventDefault();
        document.getElementById("err").innerHTML = `Podaj login i hasło`;
    }
}

