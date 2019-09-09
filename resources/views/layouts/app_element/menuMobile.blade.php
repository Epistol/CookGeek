<mobile-menu>
    <navigation-link url="{{ route('home') }}"
                     @if(Route::currentRouteNamed('home')) active="true" @endif >
        <i class="far fa-user"></i>
        Mon profil
    </navigation-link>

    <navigation-link url="{{ route('recipe.index') }}">
        <i class="fas fa-home"></i>
        Recettes
    </navigation-link>
</mobile-menu>
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
