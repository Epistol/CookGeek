<aside class="menu">
    <div class="menu">
        <div class="sous_cat">
            <p class="menu-label">
                Mon compte
            </p>
            <ul class="menu-list">
                <li>
                    <a href="{{route('account.param')}}" class="
                        @if(Route::currentRouteNamed('account.param') || Route::currentRouteNamed('account.data') || Route::currentRouteNamed('account.info'))
                    {{'is-active'}}
                    @endif">Paramètres</a>
                    {{--<a href="{{route('account.data')}}">Mes données</a>--}}
                </li>
            </ul>
        </div>
        <div class="sous_cat">
            <p class="menu-label">
                Recettes
            </p>
            <ul class="menu-list">
                <li>
                    <a href="{{route('account.fav')}}"
                       class="   @if(Route::currentRouteNamed('account.fav'))
                       {{'is-active'}}
                       @endif">Favoris</a>
                    <a href="{{route('account.recipe')}}">Mes recettes</a>
                </li>
            </ul>
        </div>
        {{-- <div class="sous_cat">
             <p class="menu-label">
                 Boutique
             </p>
             <ul class="menu-list">
                 <li>
                     <a href="#">Favoris</a>
                     <a href="#">Mes recettes</a>
                 </li>
             </ul>
         </div>--}}

    </div>
</aside>

