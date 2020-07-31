require('./bootstrap');

var select = document.querySelector('#city_list');
// var url = window.location.protocol + "//" + window.location.host;
var url = 'http://localhost/pogoda/public';

select.addEventListener('change', makeRequest );

function makeRequest() {
    httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
        console.log('Giving up :( Cannot create an XMLHTTP instance');
        return false;
    }

    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', url + '/api/city/' + this.value );
    httpRequest.send();
}

function alertContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {

        var response = JSON.parse( httpRequest.responseText );

        document.getElementById("city_name").textContent = response.name;
        document.getElementById("city__icon").src = 'http://openweathermap.org/img/wn/' + response.icon_code + '@2x.png';
        document.getElementById("city__temp").textContent = response.temperature;
        document.getElementById("city__pressure").textContent = response.pressure;
        document.getElementById("city__humidity").textContent = response.humidity;
        document.getElementById("city__wind_speed").textContent = response.wind_speed;
        document.getElementById("city__clouds").textContent = response.clouds;
        } else {
        console.log(httpRequest);
        alert('Wystąpił błąd. Proszę spróbować za później');
        }
    }
}