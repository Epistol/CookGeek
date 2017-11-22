<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
    <div id="app">
      @include("layouts.menu")

        @yield('content')
    </div>

    @include("layouts.footer")

    <!-- Scripts -->


    <script src="https://use.fontawesome.com/403c56d95d.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
