<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('titrepage')@yield('titrepage') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif</title>
    <meta name="description" content="@hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">

    <!-- ROBOTS -->
    @include("layouts.app_element.robot")
    <!-- Links to information about the author(s) of the document -->
    <link rel="author" href="humans.txt">
    <link rel="index" href="{{url('/')}}">
    <link rel="webmention" href="https://webmention.herokuapp.com/api/webmention" />

    <!-- Feeds -->
    {{--<link rel="alternate"  href="/rss" type="application/rss+xml" title="RSS">--}}
    <link rel="alternate" type="application/atom+xml" title="New recipes" href="/rss">

    @include("layouts.app_element.icons")

    <!-- Meta OG -->
    @include("layouts.app_element.meta_og")
    @include("layouts.app_element.twitter")
    @include("layouts.app_element.gplus")
    @include("layouts.app_element.fb")
    @include("layouts.app_element.apple")

    <meta name="mobile-web-app-capable" content="yes">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/nouislider.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}"  rel="stylesheet">

</head>
<body>
<div id="app">@include("layouts.menu")@yield('content')</div>
@include("layouts.footer")
<!-- Scripts -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script><?php
    if(Auth::check() == FALSE || Auth::check() == ''){
        echo "var userIsLoggedIn = 0;";
    }
    else {
        echo "var userIsLoggedIn = 1;";
    }
    ?>

    /*(function () {
        var sn = document.createElement("script"), s = document.getElementsByTagName("script")[0], url;
        url = document.querySelectorAll ? document.querySelectorAll("link[rel~=canonical]") : false;
        url = url && url[0] ? url[0].href : false;
        sn.type = "text/javascript"; sn.async = true;
        sn.src = "//webmention.herokuapp.com/api/embed?url=" + encodeURIComponent(url || window.location);
        s.parentNode.insertBefore(sn, s);
    }());*/
</script>

<link href="https://use.fontawesome.com/releases/v5.0.3/css/all.css" rel="stylesheet">


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/lightbox.js') }}" defer async></script>
<script src="/js/konami.js"></script>
<script src="/js/toasty/jquery.toasty.js"></script>
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
               $("body").toasty();

               var easter_egg = new Konami(function() {
                   $("body").toasty('pop');
               });

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
