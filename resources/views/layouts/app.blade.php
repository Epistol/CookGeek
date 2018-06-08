<!DOCTYPE html>
<html class="has-navbar-fixed-top" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('titrepage')@yield('titrepage')
        - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif</title>
    <meta name="description"
          content="@hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">

    <!-- ROBOTS -->
@include("layouts.app_element.robot")
<!-- Links to information about the author(s) of the document -->
    <link rel="author" href="{{asset('humans.txt')}}">
    <link rel="index" href="{{url('/')}}">
    <link rel="webmention" href="https://webmention.herokuapp.com/api/webmention"/>

    <!-- Feeds -->
    {{--<link rel="alternate"  href="/rss" type="application/rss+xml" title="RSS">--}}
    <link rel="alternate" type="application/atom+xml" title="New recipes" href="{{url('/rss')}}">

    @include("layouts.app_element.icons")

<!-- Meta OG -->
    @include("layouts.app_element.meta_og")
    @include("layouts.app_element.twitter")
    @include("layouts.app_element.gplus")
    @include("layouts.app_element.fb")
    @include("layouts.app_element.apple")

    <meta name="mobile-web-app-capable" content="yes">

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/buefy/lib/buefy.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/nouislider.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    {{--    <link rel="stylesheet" type="text/css"
              href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.4/dist/instantsearch-theme-algolia.min.css">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css"
          integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
</head>
<body>
<div id="app">@include("layouts.menu")

    <div class="container">
        @if ($errors->any())
            <div class="notification alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="notification alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    @yield('content')
</div>
@include("layouts.footer")



<!-- SCRIPTS  -->
<script><?php
    if (Auth::check() == FALSE || Auth::check() == '') {
        echo "var userIsLoggedIn = 0;";
    } else {
        echo "var userIsLoggedIn = 1;";
    }
    ?>
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function SubmitFn(token) {

        $.ajax({
            type: "POST",
            url: "https://www.google.com/recaptcha/api/siteverify",
            data: { token: token },
            success: function (response) {
                if (response == true) {
                    document.getElementById("formulaire").submit();

                }
            }
        });

    }
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/lightbox.js') }}" defer async></script>

<div id="fb-root"></div>

<script defer src="https://use.fontawesome.com/releases/v5.0.11/js/v4-shims.js"></script>

<script type="application/javascript">

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.11&appId=107304179368120';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    var toast_png = "{{ asset('js/toasty/toasty.png')}}";
    var toast_mp3 = "{{ asset('js/toasty/toasty.mp3')}}";

    $(document).ready(function () {
        $("body").toasty();

        var easter_egg = new Konami(function () {
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

<script src="{{ asset('js/toasty/jquery.toasty.js')}}"></script>
<script src="{{ asset('js/konami.js') }}" defer async></script>


@include("layouts.js.analytics")
@include("layouts.js.tartecitron")


</body>
</html>
