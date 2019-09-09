<body class="">
<div id="app">
    <div v-cloak>
        @include("layouts.app_element.menuMobile")

        <div id="bodyWebsite">
            @include("layouts.app_element.menu")
            <div class="">
                @include('layouts.app_element.alerts')
                @yield('content')
            </div>
        </div>
    @include("layouts.app_element.footer")
    </div>
</div>
@include("layouts.app.parts.scripts")
</body>