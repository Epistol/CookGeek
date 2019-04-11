<aside class="menu" xmlns:Request="http://www.w3.org/1999/xhtml">
    <p class="menu-label">
        <a href="{{"/admin"}}"> Admin</a>
    </p>

    <ul class="menu-list">
        <li>
            <a href="{{route("admin.ban.index")}}" {{ Route::currentRouteNamed('admin.ban.*') ? ' class=is-active' : null  }} >Ban</a>
            <a href="{{route("page.index")}}" {{ Route::currentRouteNamed('page.*') ? ' class=is-active' : null  }} >Pages</a>
            <a href="{{route("admin.recipe.index")}}" {{ Route::currentRouteNamed('voyager.users.*') ? ' class=is-active' : null  }} >Recipes</a>
            <a href="{{route("admin.universe.index")}}" {{ Route::currentRouteNamed('admin.universe.*') ? ' class=is-active' : null  }} >Univers</a>
            <a href="{{route("admin.user.index")}}" {{ Route::currentRouteNamed('admin.user.*') ? ' class=is-active' : null  }} >Users</a>

        </li>
    </ul>

</aside>