<aside class="menu" xmlns:Request="http://www.w3.org/1999/xhtml">
    <p class="menu-label">
        <a href="{{"/admin"}}">Admin</a>
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{route("admin.page.index")}}"
                    {{ Route::currentRouteNamed('page.*') ? ' class=is-active' : null  }}>
                <i class="far fa-file-alt"></i> Pages
            </a>
            <a href="{{route("admin.recipe.index")}}"
                    {{ Route::currentRouteNamed('voyager.users.*') ? ' class=is-active' : null  }} >
                <i class="fas fa-hamburger"></i>    Recipes
            </a>
            <a href="{{route("admin.universe.index")}}"
                    {{ Route::currentRouteNamed('admin.universe.*') ? ' class=is-active' : null  }} >
                <i class="fas fa-globe-europe"></i> Univers
            </a>
        </li>
    </ul>

    <p class="menu-label">
        <a href="{{route("admin.user.index")}}">
            <i class="fas fa-users"></i> Users
        </a>
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{route("admin.ban.index")}}"
                    {{ Route::currentRouteNamed('admin.ban.*') ? ' class=is-active' : null  }}>
                <i class="far fa-times-circle"></i>  Ban
            </a>
        </li>
    </ul>

</aside>