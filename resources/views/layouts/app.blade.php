<!DOCTYPE html>
<html class="has-navbar-fixed-top" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('titrepage')@yield('titrepage') - Cuisine De Geek @else Cuisine De Geek @endif</title>

    <!-- ROBOTS -->
@include("layouts.app_element.robot")
<!-- Links to information about the author(s) of the document -->
    <link rel="author" href="{{asset('humans.txt')}}">
    <link rel="index" href="{{url('/')}}">
    <link rel="webmention" href="https://webmention.herokuapp.com/api/webmention"/>

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

    <!-- Styles -->
    @include("layouts.style")
    @include("layouts.cookie")
    {{--@include("layouts.cookiebot")--}}

</head>
<body>
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
            <notif title="is-success" v-if="seen" @close="seen = false">
                <span slot="text">   {{ session('status') }}</span>
            </notif>
        @endif

        @if (session('alert'))
            <notif title="is-alert" v-if="seen" @close="seen = false">
                <span slot="text">   {{ session('alert') }}</span>
            </notif>
        @endif
    </div>

    @yield('content')

</div>

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

@include("layouts.footer")


<!-- SCRIPTS  -->
<script type="application/javascript"><?php
	if(Auth::check() == FALSE || Auth::check() == '') {
		echo "var userIsLoggedIn = 0;";
	} else {
		echo "var userIsLoggedIn = 1;";
	}
	?>

		// @see https://docs.headwayapp.co/widget for more configuration options.
		var HW_config = {
			selector: "#updates", // CSS selector where to inject the badge
			account:  "J05Ovy"
		}
</script>
<script async src="https://cdn.headwayapp.co/widget.js"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/lightbox.js') }}" defer async></script>

<div id="fb-root"></div>

<script defer src="https://use.fontawesome.com/releases/v5.0.11/js/v4-shims.js"></script>

<script type="application/javascript">

	var toast_png = "{{ asset('js/toasty/toasty.png')}}";
	var toast_mp3 = "{{ asset('js/toasty/toasty.mp3')}}";

	$(document).ready(function() {
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

<script src="{{ asset('js/toasty/jquery.toasty.js')}}"></script>
<script src="{{ asset('js/konami.js') }}" defer async></script>

@include("layouts.js.analytics")
@include("layouts.js.tartecitron")


</body>
</html>
