<div class="fixed is-fixed-top">
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
                    BETA
                </span>
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
                        <a class="navbar-link bg-white" href="{{ route('recipe.index') }}">
                            Recettes
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('recipe.add') }}">
                                <img src="{{asset('/img/icons/add_round.svg')}}" style="padding-right: 0.5rem"/>
                                Ajouter une nouvelle
                            </a>
                            <a class="navbar-item" href="{{ route('recipe.index') }}">
                                <img src="{{asset('/img/icons/a_to_z.svg')}}" style="padding-right: 0.5rem"/>
                                Toutes les recettes
                            </a>
                            <a class="navbar-item" href="{{ route('recipe.index') }}">
                                <img src="{{asset('/img/icons/news.svg')}}" style="padding-right: 0.5rem"/>
                                Dernières recettes
                            </a>
                            <a class="navbar-item" href="{{route('ingredient.index')}}">
                                <img src="{{asset('/img/icons/ingredients.svg')}}" style="padding-right: 0.5rem"/>
                                Ingrédients
                            </a>

                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link bg-white" href="{{ route('type.index') }}">
                            Types
                        </a>
                        <div class="navbar-dropdown" id="types">
                            <?php
                            $load_types = DB::table('type_recipes')->get();
                            ?>
                            @foreach($load_types as $type)
                                <a class="navbar-item bg-white" href="{{ route('type.show', lcfirst($type->name)) }}">
                                    {{ strip_tags(clean($type->name)) }}
                                </a>
                            @endforeach
                        </div>
                    </div>


                    <a class="navbar-item bg-white" href="{{route("univers.index")}}">
                        Univers
                    </a>
                    <a class="navbar-item bg-white" href="{{route('media.index')}}">
                        Médias
                    </a>
                    {{-- <a class="navbar-item">
                         Tendances
                     </a>--}}

                    <a class="navbar-item bg-white" href="{{route("recipe.random")}}">
                        <i class="fas fa-dice-d20"></i>
                        <span hidden>Recette aléatoire</span>
                    </a>

                    <div class=" search-header navbar-item bg-white">
                        <form action="{{route('search.post')}}" method="POST" role="search">
                            @csrf
                            <label for="q" style="display:none">
                                Recherche
                            </label>
                            <input class="input" type="text" placeholder="" id="q" name="q"
                                   style="padding: 0 50px 0 25px;">
                            <label for="searchbutton" style="display:none">
                                Rechercher
                            </label>
                            <button type="submit" id="searchbutton" class="header-search-button"
                                    style="position: absolute;">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>


                <div class="navbar-end">
                    @guest
                        <div class="navbar-item"><a class="button" href="{{ route('register') }}">Inscription</a></div>
                        <div class="navbar-item"><a class="button is-primary" href="{{ route('login') }}">Connexion</a>
                        </div>

                        {{--<div class="navbar-item" ><a class="button is-primary"  @click="showModal = true" >Connexion</a></div>--}}
                        {{--@include("auth.modal.login")--}}


                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-item user_profile">
                                <div class="user_picture">
                                    @if(Auth::user()->avatar !== 'users/default.png')
                                        <figure class="image is-48x48">
                                            <img class="is-rounded "
                                                 src="/user/{{Auth::user()->id}}/{{strip_tags(clean(Auth::user()->avatar))}}"
                                                 style="height: 100%;width: 100%;">
                                        </figure>
                                    @else
                                        <figure class="image is-48x48">
                                            <img class="is-rounded"
                                                 src="https://api.adorable.io/avatars/64/{{ strip_tags(clean(Auth::user()->name))}}">
                                        </figure>
                                    @endif

                                </div>
                                <a class="navbar-link">
                                    {!! str_limit(strip_tags(clean(Auth::user()->name, 25, "..."))) !!} <span class="caret"></span>
                                </a>
                            </a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('home') }}">Mon espace</a>
                                <a class="navbar-item" href="{{ route('account.fav') }}">Mes favoris</a>
                                <a class="navbar-item" href="{{ route('account.recipe') }}">Mes recettes</a>

                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                    <switch-light></switch-light>

                </div>

            </div>
        </div>
    </nav>

    <div class="navbar mobile-only" role="navigation" aria-label="main navigation">
        <!-- Collapsed Hamburger -->
        <div class="columns is-mobile is-marginless is-paddingless is-multiline">

            <div class="column is-6">
                {{--Logo--}}
                <div class="navbar-brand"><a href="http://127.0.0.1:8000" class="navbar-item is-paddingless is-marginless" style="width: 4.2rem;"><img src="http://127.0.0.1:8000/img/logoo_rond.png" alt="CDG : Cuisine De geek" style="max-height: 100%; padding: 0.2rem;"></a> <a href="http://127.0.0.1:8000" class="navbar-brand logo">
                        CDG
                        <span class="logo-beta">
                    BETA
                </span></a> </div>
            </div>
            <div class="column is-6">
                {{--User--}}
                @guest
                    <div class="navbar-item"><a class="button" href="{{ route('register') }}">Inscription</a></div>
                    <div class="navbar-item"><a class="button is-primary" href="{{ route('login') }}">Connexion</a>
                    </div>
                    {{--<div class="navbar-item" ><a class="button is-primary"  @click="showModal = true" >Connexion</a></div>--}}
                    {{--@include("auth.modal.login")--}}
                @else
                    <div class="navbar-item is-hoverable" style="display:flex;justify-content:center;align-items:flex-end;    padding-left: 1rem!important;">
                        <a class="navbar-item user_profile">
                            <div class="user_picture">
                                @if(Auth::user()->avatar !== 'users/default.png')
                                    <figure class="image is-32x32">
                                        <img class="is-rounded "
                                             src="/user/{{Auth::user()->id}}/{{strip_tags(clean(Auth::user()->avatar))}}"
                                             style="height: 100%;width: 100%;">
                                    </figure>
                                @else
                                    <figure class="image is-32x32">
                                        <img class="is-rounded"
                                             src="https://api.adorable.io/avatars/32/{{ strip_tags(clean(Auth::user()->name))}}">
                                    </figure>
                                @endif

                            </div>
                            <a class="navbar-item bg-white">
                                {{ str_limit(strip_tags(clean(Auth::user()->name, 25, "..."))) }}
                            </a>
                        </a>
                    </div>
                @endguest
            </div>

            <div class="column" >
                {{--Search icon if not shown--}}
                @if(Route::currentRouteNamed('home'))
                    @else
                @endif
                    {{--<switch-light></switch-light>--}}
            </div>
        </div>
    </div>

    @include('layouts.nav_icons')
</div>


@include('layouts.nav_icons_mobile')


