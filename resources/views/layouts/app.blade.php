<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Zadanie</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>

  <header class="site-header">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1 class="site-header__title">Zadanie rekrutacyjne</h1>
        </div>
        <div class="col-6">
          @if ( Auth::check() )
            <a class="btn btn-success" href="{{ route('miasta.index') }}">Admin panel</a>
          @else
            <a class="btn btn-primary" href="{{ route('login') }}">Zaloguj</a>
          @endif
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    @yield('content')
  </div>

  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script>

    // var select = document.getElementById('city_list');
    var select = document.querySelector('#city_list');

    select.addEventListener('change', makeRequest );

    function makeRequest(  ) {
      console.log();
    httpRequest = new XMLHttpRequest();


    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', 'http://localhost/zadanie/public/api/city/' + this.value );
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
        alert('Wystąpił błąd. Proszę spróbować za później');
      }
    }
  }
  </script>
</body>
</html>