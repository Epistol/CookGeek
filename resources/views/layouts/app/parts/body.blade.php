<body>
@include("layouts.menuMobile")
<div id="app">
    <div v-cloak>
        <div id="bodyWebsite">
            @include("layouts.menu")
            <div class="container mt-20 mx-auto">
                @include('layouts.app_element.alerts')
                @yield('content')
            </div>
        </div>
    @include("layouts.footer")
    </div>
</div>
@include("layouts.app.parts.scripts")
</body>