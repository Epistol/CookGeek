<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    @include("layouts.app_element.icons")

<!-- Meta OG -->
    @include("layouts.app_element.seo")
    @include("layouts.app_element.twitter")
    @include("layouts.app_element.gplus")
    @include("layouts.app_element.fb")
    @include("layouts.app_element.apple")
    <meta name="mobile-web-app-capable" content="yes">
    @include("layouts.app_element.style")
    @include("layouts.cookie")
    {{--@include("layouts.cookiebot")--}}

    <link href="{{ asset('css/admin.css') }}"
          rel="preload" as="style" onload="this.rel='stylesheet'">

    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            // CKEDITOR.replace('ckedivel', options);
            var toast_png = "{{ asset('js/toasty/toasty.png')}}";
            var toast_mp3 = "{{ asset('js/toasty/toasty.mp3')}}";
            var route_prefix = "{{ url(config('lfm.url_prefix', config('app.url'))) }}";
            $('#lfm').filemanager('image', {prefix: route_prefix});
            $('#lfm2').filemanager('file', {prefix: route_prefix});
        });
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        <?php
        if (Auth::check() == false || Auth::check() == '') {
            echo "var userIsLoggedIn = 0;";
        } else {
            echo "var userIsLoggedIn = 1;";
        }
        ?>
    </script>

    <script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
    <script src="{{ asset('js/lightbox/lightbox.js') }}" defer async></script>
    @include('layouts.app_element.scripts')
    <script type="application/javascript">
        var CSRFToken = $('meta[name="csrf-token"]').attr('content');
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + CSRFToken,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + CSRFToken,
            image_previewText: 'In publishing and graphic design, lorem ipsum is' +
                'placeholder text (filler text) commonly used to demonstrate the graphic' +
                'elements of a document or visual presentation'
        };
    </script>
</head>
<body class="">
@include("layouts.app_element.menuMobile")
<div id="bodyWebsite">
    <div id="app">
        @include("layouts.app_element.menu")
        @include('layouts.app_element.alerts')
        <div class="flex mb-4  m-0 full-height" id="bodySite">
            <div class="flex-1 w-2/12 left_admin">
                {{--               Left menu admin--}}
                @include("admin.elements.admin_menu")
            </div>
            <div class="flex-1 right_admin">
                @yield('content')</div>
        </div>
    </div>
</div>
@include("layouts.app_element.footer")
<!-- Scripts -->

<div id="fb-root"></div>

</body>
</html>


