<nav class="sm:invisible md:invisible lg:visible xl:visible container mx-auto
" role="navigation" aria-label="main navigation" id="first-navbar">
    <!-- Collapsed Hamburger -->
    <div id="logo-navbar">
        <a class="navbar-item is-paddingless is-marginless" href="{{ url('/') }}" style="width: 4.2rem;">
            <img src="{{asset('img/logoo_rond.png')}}" alt="CDG : Cuisine De geek"
                 class="max-h-8 p-1 "
                 style="
             max-height: fit-content;">
            <span class="font-brand">{{ ucfirst(config('app.name', 'Laravel')) }}</span>
            <span class="logo-beta">
                    BETA V2
                </span>
        </a>
    </div>
    @include('layouts.menu.navbar')
</nav>