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
@include("layouts.style")

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="">
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
                <span slot="text">   {{ session('status') }}</span>
            </Notif>
        @endif

            @if (session('alert'))
                <Notif title="is-alert" v-if="seen" @close="seen = false">
                    <span slot="text">   {{ session('alert') }}</span>
                </Notif>
            @endif

    </div>

        @yield('content')

    </div>
    @include("layouts.footer")
</div>




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

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/lightbox.js') }}" defer async></script>

<div id="fb-root"></div>

<script defer src="https://use.fontawesome.com/releases/v5.0.11/js/v4-shims.js"></script>
<script src="{{ asset('js/konami.js') }}" defer async></script>

<script type="application/javascript">

	var toast_png = "{{ asset('js/toasty/toasty.png')}}";
	var toast_mp3 = "{{ asset('js/toasty/toasty.mp3')}}";

	$(document).ready(function() {
		$("body").toasty();

		var easter_egg = new Konami(function() {
			$("body").toasty('pop');
		});
	});
</script>

<script src="{{ asset('js/toasty/jquery.toasty.js')}}"></script>

@include("layouts.js.analytics")
@include("layouts.js.tartecitron")


</body>
</html>