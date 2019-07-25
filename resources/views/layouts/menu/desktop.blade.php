<nav class="flex items-center justify-between flex-wrap
visible sm:invisible md:invisible lg:visible xl:visible w-full
" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->

    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a class="navbar-item is-paddingless is-marginless" href="{{ url('/') }}" style="width: 4.2rem;">
            <img src="{{asset('img/logoo_rond.png')}}" alt="CDG : Cuisine De geek"
                 class="max-h-full p-1"
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