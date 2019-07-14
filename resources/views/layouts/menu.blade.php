<div class="fixed is-fixed-top">
    @include('layouts.menu.desktop')
    @include('layouts.menu.mobile')
    @if(!Route::is('admin.*'))
        @include('layouts.menu_second.nav_icons')
    @endif
</div>
@if(!Route::is('admin.*'))
    @include('layouts.menu_second.nav_icons_mobile')
@endif

