<nav class="navbar desktop-only" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item is-paddingless is-marginless" href="{{ url('/') }}" style="width: 4.2rem;">
                <img src="{{asset('img/logoo_rond.png')}}" alt="CDG : Cuisine De geek" style="
    max-height: fit-content;max-height: 100%;padding: 0.2rem;
">
            </a>
            <a class="navbar-brand logo" href="{{ url('/') }}">
                {{ ucfirst(config('app.name', 'Laravel')) }}
                <span class="logo-beta">
                    BETA V2
                </span>
            </a>

            <button class="button navbar-burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
            @include('layouts.menu.navbar')
    </div>
</nav>