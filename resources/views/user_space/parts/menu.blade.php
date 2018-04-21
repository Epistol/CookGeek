<div class="column" id="left_column">

    <aside class="menu">
        <div class="user">
            <div class="user_picture">
                <img src="https://api.adorable.io/avatars/64/{{Auth::user()->name}}">
            </div>
            <span class="pseudo">
                {{Auth::user()->name}}
            </span>
        </div>
        <div class="menu">
            <div class="sous_cat">
                <p class="menu-label">
                    Mon compte
                </p>
                <ul class="menu-list">
                    <li>
                        <a href="#">Paramètres</a>
                        <a href="#">Mes données</a>
                    </li>
                </ul>
            </div>
            <div class="sous_cat">
                <p class="menu-label">
                    Recettes
                </p>
                <ul class="menu-list">
                    <li>
                        <a href="#">Favoris</a>
                        <a href="#">Mes recettes</a>
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


</div>