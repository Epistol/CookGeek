<aside class="menu" xmlns:Request="http://www.w3.org/1999/xhtml">
    <p class="menu-label">
        <a href="{{route("voyager.dashboard")}}"> Admin</a>
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{route("voyager.dashboard")}}" {{ Route::currentRouteNamed('voyager.dashboard') ? ' class=is-active' : NULL  }}>Accueil</a>
        </li>
    </ul>

    <ul class="menu-list">
        <li>

            <a href="{{route("admin.recipe.index")}}" {{ Route::currentRouteNamed('voyager.users.index') ? ' class=is-active' : NULL  }} >Recipes</a>
            <a href="{{route("admin.ban.index")}}" {{ Route::currentRouteNamed('admin.ban.index') ? ' class=is-active' : NULL  }} >Ban</a>

        </li>
    </ul>

</aside>