<div class="sticky top-0  w-full z-30">
    <div class="hidden invisible md:visible md:flex z-10 w-full bg-white" id="topmenu">
        <nav class="invisible md:flex lg:visible lg:visible container w-full items-center
mx-auto justify-between flex-wrap flex-shrink-0
" role="navigation" aria-label="main navigation" id="first-navbar">
            <!-- Collapsed Hamburger -->
            <div id="logo-navbar">
                <a class="navbar-item  m-0" href="{{ url('/') }}" style="width: 4.2rem;">
                    <img src="{{asset('img/logoo_rond.png')}}" alt="CDG : Cuisine De geek"
                         class="max-h-8 p-1"
                         style="max-height: fit-content;">
                </a>
                <a class="navbar-item  m-0" href="{{ url('/') }}" style="width: 4.2rem;">

                    <span class="font-brand">{{ ucfirst(config('app.name', 'Laravel')) }}</span>
                    <span class="logo-beta">
                    BETA V2
            </span>
                </a>
            </div>
            {{--    @include('layouts.menu.navbar')--}}
        </nav>
    </div>
    <div class="hidden md:visible md:flex z-10 bg-fog shadow" id="iconsMenu">
        @if(!Route::is('admin.*'))
            <div class="container mx-auto sm:hidden md:block">
                @include('layouts.menu_second.nav_icons')
            </div>
        @endif
    </div>
    @if(!Route::is('admin.*'))
        {{--    @include('layouts.menu_second.nav_icons_mobile')--}}
    @endif

</div>

