<!DOCTYPE html>
<html class="has-navbar-fixed-top" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('titrepage')
        <title>@yield('titrepage') - {{config('app.long_name')}}</title>
    @else
        <title>{{config('app.long_name')}}</title>
    @endif
    @include('layouts.app_element.leetcdg')

<!-- ROBOTS -->
    @include("layouts.app_element.robot")
<!-- Links to information about the author(s) of the document -->
    <link rel="author" href="{{asset('humans.txt')}}">
    <link rel="index" href="{{url('/')}}">
    <link rel="webmention" href="https://webmention.herokuapp.com/api/webmention"/>
    <link rel='dns-prefetch' href='//{{config('app.url')}}'>
    <link rel="manifest" href="/site.webmanifest">

    <!-- Feeds -->
    {{--<link rel="alternate"  href="/rss" type="application/rss+xml" title="RSS">--}}
    <link rel="alternate" type="application/atom+xml" title="New recipes - CDG" href="{{url('/rss')}}">

    @include("layouts.app_element.icons")

<!-- Meta OG -->
    @include("layouts.app_element.seo")
    @include("layouts.app_element.twitter")
    @include("layouts.app_element.gplus")
    @include("layouts.app_element.fb")
    @include("layouts.app_element.apple")

    <meta name="mobile-web-app-capable" content="yes">
    @if(Route::currentRouteNamed('admin.*'))
        <script src="{{asset('/js/tinymce/js/tinymce.min.js')}}"></script>
        <script>tinymce.init({selector: '#tinymce'});</script>
    @endif

<!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @include("layouts.app_element.style")
    @include("layouts.cookie")
</head>
<body class="">
@include("layouts.app_element.menuMobile")

<div id="bodyWebsite">
    <div id="app">
        @include("layouts.app_element.menu")
        <div class="container">
            @include('layouts.app_element.alerts')
            @yield('content')
        </div>
    </div>
    @include("layouts.app_element.footer")
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

<script>
    var toast_png = "{{ asset('js/toasty/toasty.png')}}";
    var toast_mp3 = "{{ asset('js/toasty/toasty.mp3')}}";
</script>
@if(Route::currentRouteNamed('recipe.edit'))
    <script src="{{ asset('js/recipeEdit.js') }}"></script>
@else
    <script src="{{ asset('js/app.js') }}"></script>
@endif


@include('layouts.app_element.scripts')
</body>
</html>
