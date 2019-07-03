<div class="is-fixed-bottom mobile-only">
    <nav class="navbar mobile-bottom-menu" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item bg-white" href="{{ route('home') }}">
                <i class="fas fa-home"></i>
            </a>
            <a class="navbar-item bg-white" href="{{ route('recipe.index') }}">
                <i class="fas fa-utensils"></i>
            </a>
            <a class="navbar-item bg-white" href="{{ route('recipe.index') }}">
                <i class="far fa-treasure-chest"></i>
            </a>
            <a class="navbar-item bg-white" href="{{route('page.shop')}}">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <div class="user_picture">
                @if(Auth::user()->avatarUser !== '')
                    <figure class="image is-32x32">
                        <img class="is-rounded test"
                             src="{{cleanInput(Auth::user()->avatarUser)}}"
                             style="height: 100%;width: 100%;">
                    </figure>
                @else
                    <figure class="image is-32x32">
                        <img class="is-rounded"
                             src="https://api.adorable.io/avatars/32/{{Auth::user()->name}}">
                    </figure>
                @endif
            </div>
        </div>
    </nav>

</div>