const FORM = document.querySelector('form');
let elements = document.querySelectorAll('input');
let error = document.getElementById("err");

function isEmpty(element) {
    return element.value.trim() === "";
}


FORM.onsubmit = (event) => {
    elements.forEach(element => {
        console.log(element);
        if (isEmpty(element)) {
            console.log("element " + element + " jest pusty");
            event.preventDefault();
            error.innerHTML = "Proszę podać wszystkie dane";
            return;
        }
    });    
}