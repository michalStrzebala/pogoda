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

  <header class="site-header pb-3 pt-3">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1 class="site-header__title font-weight-bold">Zadanie rekrutacyjne</h1>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-end">
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

  <script src="{{ asset('js/app.js') }}" rel="javascript" type="text/javascript"></script>
</body>
</html>