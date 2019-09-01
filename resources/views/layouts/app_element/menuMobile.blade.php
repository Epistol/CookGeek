<div class="is-fixed-bottom sm:hidden md:hidden lg:hidden">
    <nav class="navbar mobile-bottom-menu" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item " href="{{ route('home') }}">
                <i class="fas fa-home"></i>
            </a>
            <a class="navbar-item " href="{{ route('recipe.index') }}">
                <i class="fas fa-utensils"></i>
            </a>
            <a class="navbar-item " href="{{ route('recipe.index') }}">
                <i class="far fa-treasure-chest"></i>
            </a>
            <a class="navbar-item " href="{{route('page.shop')}}">
                <i class="fas fa-shopping-cart"></i>
            </a>
            @auth
            <div class="user_picture">
                @if(Auth::user()->avatarUser !== '')
                    <figure class="w-6 h-6">
                        <img class="rounded-full test"
                             alt="Avatar"
                             src="{{cleanInput(Auth::user()->avatarUser)}}"
                             style="height: 100%;width: 100%;">
                    </figure>
                @else
                    <figure class="w-6 h-6">
                        <img class="rounded-full"
                             src="https://api.adorable.io/avatars/32/{{Auth::user()->name}}">
                    </figure>
                @endif
            </div>
                @endauth
        </div>
    </nav>

</div>