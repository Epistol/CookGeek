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
                        {{trans_choice('recipe.recipe', 2)}}
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ route('recipe.create') }}">
                            <img src="{{asset('/img/icons/add_round.svg')}}" style="padding-right: 0.5rem"/>
                            @lang('recipe.add-new')
                        </a>
                        <a class="navbar-item" href="{{ route('recipe.index') }}">
                            <img src="{{asset('/img/icons/a_to_z.svg')}}" style="padding-right: 0.5rem"/>
                            @lang('recipe.all-recipes')
                        </a>
                        <a class="navbar-item" href="{{ route('recipe.index') }}">
                            <img src="{{asset('/img/icons/news.svg')}}" style="padding-right: 0.5rem"/>
                            @lang('recipe.last-recipes')
                        </a>
                        <a class="navbar-item" href="{{route('ingredient.index')}}">
                            <img src="{{asset('/img/icons/ingredients.svg')}}" style="padding-right: 0.5rem"/>
                            @lang('recipe.ingredients')
                        </a>

                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link bg-white" href="{{ route('type.index') }}">
                        {{trans_choice('recipe.types', 2)}}
                    </a>
                    <div class="navbar-dropdown" id="types">
                        @foreach(DB::table('type_recipes')->get() as $type)
                            <a class="navbar-item bg-white" href="{{ route('type.show', lcfirst($type->name)) }}">
                                {{ strip_tags(clean($type->name)) }}
                            </a>
                        @endforeach
                    </div>
                </div>


                <a class="navbar-item bg-white" href="{{route("univers.index")}}">
                    @lang('recipe.univers')
                </a>
                <a class="navbar-item bg-white" href="{{route('media.index')}}">
                    @lang('common.medias')
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
                        @include('layouts.menu._search')
                    </form>
                </div>

            </div>


            <div class="navbar-end">
                <a class="navbar-item bg-white" href="{{route('page.shop')}}">
                    {{__('common.goodies')}}
                </a>
                @guest
                    <div class="navbar-item"><a class="button"
                                                href="{{ route('register') }}">{{__('common.register')}}</a></div>
                    <div class="navbar-item"><a class="button is-primary"
                                                href="{{ route('login') }}">{{__('common.login')}}</a>
                    </div>

                    {{--<div class="navbar-item" ><a class="button is-primary"  @click="showModal = true" >Connexion</a></div>--}}
                    {{--@include("auth.modal.login")--}}
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-item user_profile">
                            <div class="user_picture">
                                @if(Auth::user()->img !== '')
                                    <figure class="image is-48x48">
                                        <img class="is-rounded "
                                             src="{{cleanInput(Auth::user()->img)}}"
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
                                {!! str_limit(strip_tags(clean(Auth::user()->name, 25, "..."))) !!} <span
                                        class="caret"></span>
                            </a>
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('home') }}">{{__('common.my_space')}}</a>
                            <a class="navbar-item"
                               href="{{ route('account.fav') }}">{{__('common.my_favorites')}}</a>
                            <a class="navbar-item"
                               href="{{ route('account.recipe') }}">{{__('common.my_recipes')}}</a>

                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{__('common.logout')}}
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