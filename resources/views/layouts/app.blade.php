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
    <script src="/js/konami.js"></script>
    <script src="/js/toasty/jquery.toasty.js"></script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.11&appId=107304179368120';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <script type="application/javascript">
        $(document).ready( function(){
            $("body").toasty();

            var easter_egg = new Konami(function() {
                $("body").toasty('pop');
            });
        });
    </script>

</body>
</html>
