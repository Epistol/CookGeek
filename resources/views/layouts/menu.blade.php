<nav class="navbar" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->

    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item is-paddingless is-marginless" href="{{ url('/') }}" style="width: 4.2rem;">
                <img src="{{asset('img/logoo_rond.png')}}" alt="CDG : Cuisine De geek" style="
    max-height: fit-content;max-height: 100%;
">
            </a>

            <a class="navbar-brand logo" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="button navbar-burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="{{ route('recipe.index') }}">
                        Recettes
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ route('recipe.add') }}">
                            Ajouter
                        </a>
                    </div>
                </div>

                <a class="navbar-item" href="{{ route('type.index') }}">
                    Types
                </a>
                <a class="navbar-item">
                    Univers
                </a>
                <a class="navbar-item">
                    Médias
                </a>
                <a class="navbar-item">
                    Tendances
                </a>

                <a class="navbar-item" href="{{route("recipe.random")}}">
                    🎲
                </a>

                <div class="field search_header navbar-item">
                    <form action="{{route('search')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        <ais-index app-id="{{ config('scout.algolia.id') }}"
                                   api-key="{{ env('ALGOLIA_SEARCH') }}"
                                   index-name="recipes" autofocus=false>

                            <ais-input placeholder="Search contacts..."></ais-input>

                            <ais-results>
                                <template slot-scope="{ result }">
                                    <div>
                                        <h1>@{{ result.title }}</h1>


                                    </div>
                                </template>
                            </ais-results>

                        </ais-index>


                    </form>
                </div>
            </div>

            <div class="navbar-end">
                @guest
                    <a class="navbar-item" href="{{ route('login') }}">Login</a>
                    <a class="navbar-item" href="{{ route('register') }}">Register</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('home') }}">Dashboard</a>

                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endguest


            </div>

        </div>
    </div>
</nav>

