<div class="" id="navMenu">
    <menu-element>
        <div slot="buttontext">
            {{trans_choice('recipe.recipe', 2)}}
        </div>
        <div slot="menuelems">
            <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-pink mr-4"
               href="{{ route('recipe.create') }}">
                <img src="{{asset('/img/icons/add_round.svg')}}" style="padding-right: 0.5rem"/>
                @lang('recipe.add-new')
            </a>
            <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-pink mr-4"
               href="{{ route('recipe.index') }}">
                <img src="{{asset('/img/icons/a_to_z.svg')}}" style="padding-right: 0.5rem"/>
                @lang('recipe.all-recipes')
            </a>
            <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-pink mr-4"
               href="{{ route('recipe.index') }}">
                <img src="{{asset('/img/icons/news.svg')}}" style="padding-right: 0.5rem"/>
                @lang('recipe.last-recipes')
            </a>
            <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-pink mr-4"
               href="{{route('ingredient.index')}}">
                <img src="{{asset('/img/icons/ingredients.svg')}}" style="padding-right: 0.5rem"/>
                @lang('recipe.ingredients')
            </a>
        </div>
    </menu-element>

    <div class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4 has-dropdown is-hoverable">
        <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4"
           href="{{ route('type.index') }}">
            {{trans_choice('recipe.types', 2)}}
        </a>
        {{--<div class="navbar-dropdown" id="types">
            @foreach(DB::table('type_recipes')->get() as $type)
                <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4 bg-white" href="{{ route('type.show', lcfirst($type->name)) }}">
                    {{ strip_tags(clean($type->name)) }}
                </a>
            @endforeach
        </div>--}}
    </div>

    <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4" href="{{route("univers.index")}}">
        @lang('recipe.univers')
    </a>
    <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4" href="{{route('media.index')}}">
        @lang('common.medias')
    </a>
    {{-- <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4">
         Tendances
     </a>--}}

    <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4" href="{{route("recipe.random")}}">
        <i class="fas fa-dice-d20"></i>
        <span hidden>{{trans_choice('recipe.random', 2)}}</span>
    </a>
    <div class=" search-header block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4">
        <form action="{{route('search.post')}}" method="POST" role="search">
            @csrf
            @include('layouts.menu._search')
        </form>
    </div>
</div>
<div class="">
    @guest
        <div class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4">
            <a class="button is-primary" href="{{ route('login') }}">
                            <span class="icon is-small">
                            <i class="far fa-user-circle"></i>
                            </span>
                {{__('common.login')}}
            </a>
        </div>
        {{--<div class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4" ><a class="button is-primary"  @click="showModal = true" >Connexion</a></div>--}}
        {{--@include("auth.modal.login")--}}
    @else
        <div class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4 has-dropdown is-hoverable">
            <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4 user_profile">
                <div class="user_picture">
                    @if(Auth::user()->avatarUser !== '')
                        <figure class="image is-48x48">
                            <img class="is-rounded test"
                                 alt="Avatar"
                                 src="{{cleanInput(Auth::user()->avatarUser)}}"
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
                    {{Auth::user()->pseudo}} <span
                            class="caret"></span>
                </a>
            </a>
            <div class="navbar-dropdown">
                <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4"
                   href="{{ route('home') }}">{{__('common.my_space')}}</a>
                <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4"
                   href="{{ route('account.fav') }}">{{__('common.my_favorites')}}</a>
                <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4"
                   href="{{ route('account.recipe') }}">{{__('common.my_recipes')}}</a>

                <a class="block mt-4 lg:inline-block lg:mt-0 text-purple hover:text-pink mr-4"
                   href="{{ route('logout') }}"
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
