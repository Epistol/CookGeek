<aside class="menu" xmlns:Request="http://www.w3.org/1999/xhtml">
    <p class="menu-label">
        <a href="{{route("voyager.dashboard")}}"> Voyager</a>
    </p>


    <ul class="menu-list">
        <li>
            <a href="{{route("voyager.dashboard")}}" {{ Route::currentRouteNamed('voyager.dashboard') ? ' class=is-active' : NULL  }}>Accueil</a>
            @if(Route::has('voyager.recipes.index'))
            <a href="{{route("voyager.recipes.index")}}" {{ Route::currentRouteNamed('voyager.recipes.*') ? ' class=is-active' : NULL  }} >Voyager Recipes</a>
                @endif
        </li>
    </ul>


    <p class="menu-label">
        <a href="{{"/admin"}}"> Admin</a>
    </p>

    <ul class="menu-list">
        <li>

            <a href="{{route("admin.recipe.index")}}" {{ Route::currentRouteNamed('voyager.users.*') ? ' class=is-active' : NULL  }} >Recipes</a>
            <a href="{{route("admin.ban.index")}}" {{ Route::currentRouteNamed('admin.ban.*') ? ' class=is-active' : NULL  }} >Ban</a>
            <a href="{{route("admin.user.index")}}" {{ Route::currentRouteNamed('admin.user.*') ? ' class=is-active' : NULL  }} >Users</a>
            <a href="{{route("page.index")}}" {{ Route::currentRouteNamed('page.*') ? ' class=is-active' : NULL  }} >Pages</a>

        </li>
    </ul>

</aside>