<div class="sticky top-0  w-full z-10">
    <div class="visible sm:hidden md:flex lg:visible xl:visiblez-10   w-full bg-white" id="topmenu">
        @include('layouts.menu.desktop')
        @include('layouts.menu.mobile')
    </div>
    <div class="visible sm:hidden md:flex lg:visible xl:visible  z-10 bg-fog shadow" id="iconsMenu">

        @if(!Route::is('admin.*'))
            <div class="container mx-auto ">
                @include('layouts.menu_second.nav_icons')
            </div>

        @endif
    </div>
    @if(!Route::is('admin.*'))
        {{--    @include('layouts.menu_second.nav_icons_mobile')--}}
    @endif

</div>

