<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('titrepage')
            @yield('titrepage') - {{ config('app.name', 'Laravel') }}
        @else
            {{ config('app.name', 'Laravel') }}
        @endif

    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/nouislider.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" defer async rel="stylesheet">
    <script src="https://cdn.logrocket.com/LogRocket.min.js"></script>
    <script>window.LogRocket && window.LogRocket.init('m44cpr/cdg');

    </script>
</head>
<body>
<div id="app" style="background: black;"> @include("layouts.menu")
    <div class="main_eror">
        @yield('content')
    </div>


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
        /*       $("body").toasty();

               var easter_egg = new Konami(function() {
                   $("body").toasty('pop');
               });*/


        const red = document.querySelector('#sorry');

        function setProperty(duration) {
            red.style.setProperty('--animation-time', duration +'s');
        }

        function changeAnimationTime() {
            const animationDuration = Math.floor(Math.random() * 50) + 1;
            setProperty(animationDuration);
        }

        setInterval(changeAnimationTime, 2000);

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
