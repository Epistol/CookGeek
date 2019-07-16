<aside class="menu" xmlns:Request="http://www.w3.org/1999/xhtml">
    <p class="menu-label">
        <a href="{{"/admin"}}">Admin</a>
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{route("admin.page.index")}}"
                    {{ Route::currentRouteNamed('*.page.*') ? ' class=is-active' : null  }}>
                <span class="icon ">
                    <i class="far fa-file-alt"></i>
                </span> Pages
            </a>
            <a href="{{route("admin.recipe.index")}}"
                    {{ Route::currentRouteNamed('*.recipe.*') ? ' class=is-active' : null  }} >
                 <span class="icon ">
                  <i class="fas fa-hamburger"></i>
                </span>
                Recipes
            </a>
            <a href="{{route("admin.ingredient.index")}}"
                    {{ Route::currentRouteNamed('*.ingredient.*') ? ' class=is-active' : null  }} >
                <span class="icon ">
                 <i class="fas fa-apple-alt"></i>
                </span>

                Ingrédients
            </a>
            <a href="{{route("admin.universe.index")}}"
                    {{ Route::currentRouteNamed('*.universe.*') ? ' class=is-active' : null  }} >
                <span class="icon ">
               <i class="fas fa-globe-europe"></i>
                </span>
                Univers
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
                <i class="far fa-times-circle"></i> Ban
            </a>
        </li>
    </ul>

</aside>