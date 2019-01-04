<aside class="menu blockcontent">
    <figure class="image is-128x128 avatar_menu">
        @if($user->avatar !== "users/default.png")
            <img  class="is-rounded avatar_left_menu"  src="/user/{{$user->id}}/picture/{{$user->avatar}}" />
        @else
            <img  class="is-rounded avatar_left_menu"  src="https://api.adorable.io/avatars/{{$user->id}}" />
        @endif
    </figure>

    <div class="menu">
        <h1>{{$user->name}}</h1>
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

    </div>
</aside>

