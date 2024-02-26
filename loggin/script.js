const logowanie = document.getElementById("logowanie");
let login = document.getElementById("login");
let haslo = document.getElementById("haslo");

logowanie.onsubmit = (event) => {
    console.log(login.value, haslo.value);
    if (login.value === "" || haslo.value === "") {
        event.preventDefault();
        document.getElementById("err").innerHTML = `Podaj login i hasło`;
    }
}