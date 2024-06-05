//apiKey

function onJsonApiKey(json) {
  if(json.length==0){

    const meteo = document.querySelector('#meteo-view');
    meteo.innerHTML = '';
    // Leggi il numero di risultati

      // Creiamo il div che conterrà immagine e didascalia
      const div = document.createElement('div');
      div.classList.add('divApi');
      // Creiamo la didascalia
      const errore = document.createElement('span');
      errore.textContent = "CITTA' NON TROVATA";
      errore.classList.add('scritta2');

      // Aggiungiamo didascalia al div
      div.appendChild(errore);

      // Aggiungiamo il div alla section
      meteo.appendChild(div);
      return;

  }
  const lat=json[0].lat;
  const lon=json[0].lon;
  rest_url = 'https://api.openweathermap.org/data/2.5/weather?lat='+ lat +'&lon='+ lon +'&appid='+api_key;
  // Esegui fetch
  fetch(rest_url).then(onResponseApiKey).then(onJson1);

}

function onJson1(json) {
  let temp_max=(json.main.temp_max)-273.15;
  temp_max=Math.trunc(temp_max);

  let temp_min=(json.main.temp_min)-273.15;
  temp_min=Math.trunc(temp_min);

  // Svuotiamo il contenitore

  const meteo = document.querySelector('#meteo-view');
  meteo.innerHTML = '';
    const div = document.createElement('div');
    div.classList.add('divApi');
    // Creiamo la didascalia
    const max = document.createElement('span');
    max.textContent = 'MAX TEMP: '+ temp_max+'°';
    max.classList.add('scritta2');
    const min = document.createElement('span');
    min.textContent = 'MIN TEMP: '+ temp_min+'°';
    min.classList.add('scritta2');
    // Aggiungiamo didascalia al div
    div.appendChild(max);
    div.appendChild(min);
    // Aggiungiamo il div alla section
    meteo.appendChild(div);

}

function onResponseApiKey(response) {
  return response.json();
}

function search(event)
{
  // Impedisci il submit del form
  event.preventDefault();
  // Leggi valore del campo di testo
  const citta_input = document.querySelector('input');
  const citta_value = encodeURIComponent(citta_input.id);
  // Prepara la richiesta
  rest_url = 'http://api.openweathermap.org/geo/1.0/direct?q='+ citta_value +'&limit=5&appid='+api_key;
  // Esegui fetch
  fetch(rest_url).then(onResponseApiKey).then(onJsonApiKey);
}

const api_key = 'ad1aae44ecaee9bdbdd606b748f00db1';
// Aggiungi event listener al form
const form = document.querySelector('#formApiKey');
form.addEventListener('submit', search)
