<div class="fixed is-fixed-top">
    <nav class="navbar " role="navigation" aria-label="main navigation">
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
                    <span class="beta_logo">
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
                        <a class="navbar-link" href="{{ route('recipe.index') }}">
                            Recettes
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('recipe.add') }}">
                                Ajouter
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="{{ route('type.index') }}">
                            Types
                        </a>
                        <div class="navbar-dropdown" id="types">

							<?php
							$load_types = DB::table('type_recipes')->get();
							?>
                            @foreach($load_types as $type)
                                <a class="navbar-item" href="{{ route('type.show', lcfirst($type->name)) }}">
                                    {{$type->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>


                    <a class="navbar-item" href="{{route("univers.index")}}">
                        Univers
                    </a>
                    <a class="navbar-item" href="{{route('media.index')}}">
                        Médias
                    </a>
                    {{-- <a class="navbar-item">
                         Tendances
                     </a>--}}

                    <a class="navbar-item" href="{{route("recipe.random")}}">
                        🎲
                    </a>

                    <div class="field search_header navbar-item">
                        <form action="{{route('search')}}" method="POST" role="search">
                            {{ csrf_field() }}

                            <input class="input" type="text" placeholder="" name="q" style="padding: 0 50px 0 25px;">
                            <button type="submit" class="searchheadbutton" style="position: absolute;">
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
                                                 src="/user/{{Auth::user()->id}}/{{Auth::user()->avatar}}"
                                                 style="height: 100%;width: 100%;">
                                        </figure>
                                    @else
                                        <figure class="image is-48x48">
                                            <img class="is-rounded"
                                                 src="https://api.adorable.io/avatars/64/{{Auth::user()->name}}">
                                        </figure>
                                    @endif

                                </div>
                                <a class="navbar-link">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            </a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('home') }}">Mon espace</a>

                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endguest


                </div>

            </div>
        </div>
    </nav>
    @include('layouts.nav_icons')

</div>

