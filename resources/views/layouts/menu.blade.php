<div class="flex items-center justify-between flex-wrap bg-white
visible sm:invisible md:invisible lg:visible xl:visible
 w-full h-20  z-10 top-0 mx-auto fixed">

    @include('layouts.menu.desktop')
    @include('layouts.menu.mobile')
    @if(!Route::is('admin.*'))
        @include('layouts.menu_second.nav_icons')
    @endif
</div>
@if(!Route::is('admin.*'))
{{--    @include('layouts.menu_second.nav_icons_mobile')--}}
@endif

