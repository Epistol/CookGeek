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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @include("layouts.app_element.style")
</head>
<body>
<div id="app" style="background: black;"> @include("layouts.app_element.menu")
    <div class="main-error-404">
        @yield('content')
    </div>


</div>

@include("layouts.app_element.footer")

<!-- Scripts -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    <?php
    if (Auth::check() == FALSE || Auth::check() == '') {
        echo "var userIsLoggedIn = 0;";
    } else {
        echo "var userIsLoggedIn = 1;";
    }

    ?>

</script>

<script src="https://kit.fontawesome.com/6af8152230.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/lightbox/lightbox.js') }}" defer async></script>

{{--
    <script src="/js/konami.js"></script>
    <script src="/js/toasty/jquery.toasty.js"></script>--}}
<script src="/js/nouislider.min.js"></script>
<div id="fb-root"></div>
{{--
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.11&appId=107304179368120';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
--}}


<script type="application/javascript">
    $(document).ready(function () {
        /*       $("body").toasty();

               var easter_egg = new Konami(function() {
                   $("body").toasty('pop');
               });*/


        const red = document.querySelector('#sorry');

        function setProperty(duration) {
            red.style.setProperty('--animation-time', duration + 's');
        }

        function changeAnimationTime() {
            const animationDuration = Math.floor(Math.random() * 50) + 1;
            setProperty(animationDuration);
        }

        setInterval(changeAnimationTime, 2000);


    });
</script>

</body>
</html>
