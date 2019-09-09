<div class="is-fixed-bottom sm:hidden md:hidden lg:hidden">
    <nav class="w-full mobile-bottom-menu" role="navigation" aria-label="main navigation">
        <div class="p-4 h-16 flex w-full items-center flex-row justify-between">

            <MobileMenuComponent></MobileMenuComponent>

           {{-- <a class="" href="{{ route('home') }}">
                <i class="fas fa-home"></i>
            </a>
            <a class="" href="{{ route('recipe.index') }}">
                <i class="fas fa-utensils"></i>
            </a>
            <a class="" href="{{ route('recipe.index') }}">
                <i class="fas fa-gem"></i>
            </a>
            <a class="" href="{{route('page.shop')}}">
                <i class="fas fa-shopping-cart"></i>
            </a>
            @auth
                <div class="user_picture">
                    @if(Auth::user()->avatarUser !== '')
                        <figure class="w-6 h-6 h-full w-full">
                            <img class="rounded-full test"
                                 alt="Avatar"
                                 src="{{cleanInput(Auth::user()->avatarUser)}}">
                        </figure>
                    @else
                        <figure class="w-6 h-6">
                            <img class="rounded-full"
                                 src="https://api.adorable.io/avatars/32/{{Auth::user()->name}}">
                        </figure>
                    @endif
                </div>
            @endauth--}}
        </div>


    </nav>
</div>