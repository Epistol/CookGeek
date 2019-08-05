<aside class="menu" xmlns:Request="http://www.w3.org/1999/xhtml">
    <p class="menu-label">
        <a href="{{"/admin"}}">
            <span class="icon ">
                   <i class="fas fa-tachometer-alt"></i>
                </span>
            Tableau de bord</a>
    </p>
    <ul class="menu-list has-dropdown cursor-pointer">
        <li>
            <a href="{{route("admin.page.index")}}"
                    {{ Route::currentRouteNamed('*.page.*') ? ' class="is-active"' : null  }}>

                 <span class="icon ">
                  <i class="fas fa-book"></i>
                </span>
                Pages
            </a>
            <a href="{{route("admin.recipe.index")}}"
                    {{ Route::currentRouteNamed('*.recipe.*') ? ' class="is-active"' : null  }} >
                 <span class="icon ">
                  <i class="fas fa-hamburger"></i>
                </span>
                Recipes
            </a>
            <a href="{{route("admin.ingredient.index")}}"
                    {{ Route::currentRouteNamed('*.ingredient.*') ? ' class="is-active"' : null  }} >
                <span class="icon ">
                 <i class="fas fa-apple-alt"></i>
                </span>

                Ingrédients
            </a>
            <a href="{{route("admin.universe.index")}}"
                    {{ Route::currentRouteNamed('*.universe.*') ? ' class="is-active"' : null  }} >
                <span class="icon ">
               <i class="fas fa-globe-europe"></i>
                </span>
                Univers
            </a>
        </li>
    </ul>

    <p class="menu-label {{ Route::currentRouteNamed('admin.user.*') ? 'is-open' : null  }}">
        <a href="{{route("admin.user.index")}}">
            <span class="icon">
                <i class="fas fa-users"></i>
            </span>
            Users
        </a>
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{route("admin.ban.index")}}"
                    {{ Route::currentRouteNamed('admin.ban.*') ? ' class="is-active"' : null  }}>
                Tout les utilisateurs
            </a>
        </li>
        <li>
            <a href="{{route("admin.ban.index")}}"
                    {{ Route::currentRouteNamed('admin.ban.*') ? ' class="is-active"' : null  }}>
                Ajouter
            </a>
        </li>
        <li>
            <a href="{{route("admin.ban.index")}}"
                    {{ Route::currentRouteNamed('admin.ban.*') ? ' class="is-active"' : null  }}>
                Votre profil
            </a>
        </li>
        <li>
            <a href="{{route("admin.ban.index")}}"
                    {{ Route::currentRouteNamed('admin.ban.*') ? ' class="is-active"' : null  }}>
                            <span class="icon">
                                <i class="far fa-times-circle"></i>
                            </span>
                Ban
            </a>
        </li>
    </ul>

    <p class="menu-label  {{ Route::currentRouteNamed('admin.blog.*') ? 'is-open' : null  }}">
        <a>
            <span class="icon">
                  <i class="fas fa-th-large"></i>
            </span>
            Blog
        </a>
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{route("admin.blog.add")}}"
                    {{ Route::currentRouteNamed('admin.blog.*') ? 'class="is-active"' : null  }}>
                <span class="icon">
                    <i class="fas fa-plus-circle"></i>
                    </span>
                Posts
            </a>
        </li>
    </ul>

</aside>