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
    <link href="/css/nouislider.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" defer async rel="stylesheet">
    <script src="https://cdn.logrocket.com/LogRocket.min.js"></script>
    <script>window.LogRocket && window.LogRocket.init('m44cpr/cdg');

    </script>
</head>
<body>
<div id="app">

    @include("layouts.menu")

    <section class="section no-padding-side">
        <div class="columns">
            <div class="column is-2 left_admin">

                @include("admin.elements.admin_menu")


            </div>
            <div class="column right_admin">
                @yield('content')</div>
        </div>
    </section>
</div>
    @include("layouts.footer")

<!-- Scripts -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        <?php
        if(Auth::check() == FALSE || Auth::check() == ''){
            echo "var userIsLoggedIn = 0;";
        }
        else {
            echo "var userIsLoggedIn = 1;";
        }

        ?>
    </script>

<script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
    <script src="https://use.fontawesome.com/403c56d95d.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/lightbox.js') }}" defer async></script>

    {{--
        <script src="/js/konami.js"></script>
        <script src="/js/toasty/jquery.toasty.js"></script>--}}
    <script src="/js/nouislider.min.js" ></script>
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
            CKEDITOR.replace( 'contenu' );
            /*       $("body").toasty();

                   var easter_egg = new Konami(function() {
                       $("body").toasty('pop');
                   });*/

            var slider = document.getElementById('slider');

            noUiSlider.create(slider, {
                start: [20, 80],
                connect: true,
                range: {
                    'min': 0,
                    'max': 100
                }
            });



        });
    </script>

</body>
</html>