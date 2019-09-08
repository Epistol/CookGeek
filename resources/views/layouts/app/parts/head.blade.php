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

<!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @include("layouts.app_element.style")
