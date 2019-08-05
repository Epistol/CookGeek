<div class="
visible sm:hidden md:flex lg:visible xl:visible
 h-20 z-10 top-0 fixed" id="topmenu">

    @include('layouts.menu.desktop')
    @include('layouts.menu.mobile')
    @if(!Route::is('admin.*'))
        @include('layouts.menu_second.nav_icons')
    @endif
</div>
@if(!Route::is('admin.*'))
{{--    @include('layouts.menu_second.nav_icons_mobile')--}}
@endif

