function checkNome(event) {
    const input = event.currentTarget;

    if (formStatus[input.nome] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}

function checkLuogo(event) {
    const input = event.currentTarget;

    if (formStatus[input.luogo] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}
function checkDescrizione(event) {
    const input = event.currentTarget;

    if (formStatus[input.descrizione] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}
function checkPrezzo(event) {
    const input = event.currentTarget;

    if (formStatus[input.prezzo] = input.value > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}
function checkData(event) {
    const input = event.currentTarget;
    const dataInizio=document.querySelector('.dataInizio input');

    if ((formStatus[input.dataFine] = input.value) > (formStatus[dataInizio.dataInizio] = dataInizio.value ) ) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}

const formStatus = {'upload': true};
document.querySelector('.nome input').addEventListener('blur', checkNome);
document.querySelector('.luogo input').addEventListener('blur', checkLuogo);
document.querySelector('.prezzo input').addEventListener('blur', checkPrezzo);
document.querySelector('.descrizione input').addEventListener('blur', checkDescrizione);
document.querySelector('.dataFIne input').addEventListener('blur', checkData);
