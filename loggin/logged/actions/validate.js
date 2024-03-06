let elements = document.querySelectorAll('input');
const ERR = document.getElementById("err");
const FORM = document.querySelector('form');

FORM.onsubmit = (event) => {
    elements.forEach(element => {
        if (element.value.trim() === "" || element.value.trim() === null) {
            event.preventDefault();
            ERR.innerHTML = `Nie podano wszytkich informacji`;
        } 
    });
}