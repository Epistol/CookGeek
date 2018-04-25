<div class="tabs">
    <ul>
        <li {{ Route::currentRouteNamed('account.param') ? ' class=is-active' : NULL  }}>
            <a href="{{route("account.param")}}" >
                <span>Profil</span>
            </a>
        </li>
        <li {{ Route::currentRouteNamed('account.info') ? ' class=is-active' : NULL  }}>
            <a href="{{route("account.info")}}" >
                <span>Informations</span>
            </a>
        </li>
        <li  {{ Route::currentRouteNamed('account.data') ? ' class=is-active' : NULL  }}>
            <a  href="{{route("account.data")}}">
                <span>Données</span>
            </a>
        </li>

    </ul>
</div>