<aside class="menu" xmlns:Request="http://www.w3.org/1999/xhtml">
    <p class="menu-label">
        Admin
    </p>
    <ul class="menu-list">
        <li><a>Accueil</a></li>
        <li><a>Paramètres</a></li>
    </ul>


    <ul class="menu-list">
        <li>

            <a href="" {{ Request::path() == '' ?  ' class=is-active' : NULL  }} >Membres</a>
            <a href="{{route("recipe.index")}}" {{ Request::path() == substr(route("recipe.index", '', FALSE), 1, -1) ? ' class=is-active' : NULL  }} >Recettes</a>
            <a href="{{route("page.index")}}" {{ Request::path() ==  substr(route("page.index", '', FALSE), 1, -1) ? ' class=is-active' : NULL  }} >Pages</a>
            {{--<ul>--}}
                {{--<li><a {{ Request::path() == 'admin/choristes/ajouter' ? ' class=is-active' : NULL }} href="">Ajouter un choriste</a></li>--}}
                {{--<li><a {{ Request::path() == 'admin/choristes/migration' ? ' class=is-active' : NULL }} href="">Migrer la base !2017 </a></li>--}}
                {{--  <li><a {{ Request::path() == 'admin/choristes/exporter' ? ' class="is-active"' : null }}>Exporter les choristes</a></li>--}}
                  {{--<li><a {{ Request::path() == 'admin/choristes/migration' ? ' class="is-active"' : null }} href="{{route('choriste.migration')}}" >Migrer les choristes</a></li>--}}
                {{--<li><a href="" {{ Request::path() == 'admin/choristes/valider' ? ' class=is-active' : NULL }}>Valider les choristes</a></li>--}}
            {{--</ul>--}}

        </li>
    </ul>

    {{-- <p class="menu-label">
         Transactions
     </p>
     <ul class="menu-list">
         <li><a>Payments</a></li>
         <li><a>Transfers</a></li>
         <li><a>Balance</a></li>
     </ul>--}}
</aside>