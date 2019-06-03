<!DOCTYPE html>
<html class="has-navbar-fixed-top" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('titrepage')@yield('titrepage') - Cuisine De Geek @else Cuisine De Geek @endif</title>

{{--
    ________/\\\\\\\\\__/\\\\\\\\\\\\________/\\\\\\\\\\\\_
    _____/\\\////////__\/\\\////////\\\____/\\\//////////__
    ___/\\\/___________\/\\\______\//\\\__/\\\_____________
    __/\\\_____________\/\\\_______\/\\\_\/\\\____/\\\\\\\_
    _\/\\\_____________\/\\\_______\/\\\_\/\\\___\/////\\\_
    _\//\\\____________\/\\\_______\/\\\_\/\\\_______\/\\\_
    __\///\\\__________\/\\\_______/\\\__\/\\\_______\/\\\_
    ____\////\\\\\\\\\_\/\\\\\\\\\\\\/___\//\\\\\\\\\\\\/__
    _______\/////////__\////////////______\////////////____
    --}}

<!-- ROBOTS -->
@include("layouts.app_element.robot")
<!-- Links to information about the author(s) of the document -->
    <link rel="author" href="{{asset('humans.txt')}}">
    <link rel="index" href="{{url('/')}}">
    <link rel="webmention" href="https://webmention.herokuapp.com/api/webmention"/>
    <link rel='dns-prefetch' href='//cuisinedegeek.com'>

    <!-- Feeds -->
    {{--<link rel="alternate"  href="/rss" type="application/rss+xml" title="RSS">--}}
    <link rel="alternate" type="application/atom+xml" title="New recipes - CDG" href="{{url('/rss')}}">

    @include("layouts.app_element.icons")

<!-- Meta OG -->
    @include("layouts.app_element.meta_og")
    @include("layouts.app_element.twitter")
    @include("layouts.app_element.gplus")
    @include("layouts.app_element.fb")
    @include("layouts.app_element.apple")

    <meta name="mobile-web-app-capable" content="yes">
    <script src={{asset('/js/tinymce/js/tinymce.min.js')}}></script>
    <script>tinymce.init({selector: '#tinymce'});</script>
<!-- Styles -->
    @include("layouts.style")
    @include("layouts.cookie")
</head>
<body class="">
@include("layouts.menuMobile")

<div id="bodyWebsite">
    <div id="app">
        @include("layouts.menu")
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
                <Notif title="is-success" v-if="seen" @close="seen = false">
                    <span slot="text"> {{ session('status') }}</span>
                </Notif>
            @endif

            @if (session('alert'))
                <Notif title="is-alert" v-if="seen" @close="seen = false">
                    <span slot="text"> {{ session('alert') }}</span>
                </Notif>
            @endif
        </div>

        @yield('content')

    </div>
    @include("layouts.footer")
</div>

<!-- SCRIPTS  -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "{{url()->current()}}",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{route('search.post')}}?{q}",
    "query-input": "required name=q"
  }
}

</script>

<script type="application/javascript">
    // @see https://docs.headwayapp.co/widget for more configuration options.
    var HW_config = {
        selector: "#updates", // CSS selector where to inject the badge
        account: "J05Ovy"
    };

    var toast_png = "{{ asset('js/toasty/toasty.png')}}";
    var toast_mp3 = "{{ asset('js/toasty/toasty.mp3')}}";
</script>


@if(Route::currentRouteNamed('recipe.edit'))
    <script src="{{ asset('js/recipeEdit.js') }}"></script>
@else
    <script src="{{ asset('js/app.js') }}"></script>
@endif

<script src="{{ asset('js/lightbox.js') }}" defer async></script>

<script async src="https://cdn.headwayapp.co/widget.js"></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<div id="fb-root"></div>
<script defer src="https://use.fontawesome.com/releases/v5.0.11/js/v4-shims.js"></script>

{{--Night mode--}}
<script type="application/javascript" src="{{ asset('js/load_content.js')}}"></script>
<script src="{{ asset('js/toasty/jquery.toasty.js')}}"></script>
<script src="{{ asset('js/konami.js') }}"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.3&appId=107304179368120&autoLogAppEvents=1"></script>
@include("layouts.js.analytics")
@include("layouts.js.tartecitron")
{{--@include("layouts.js.pwa")--}}

</body>
</html>
