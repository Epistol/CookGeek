<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Recettes</a></li>
        <li class="is-active"><a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem" href="{{$recette->getTypeLower()}}">{{$recette->getType()}}</a></li>
        <li  > <span style="margin-left: 0.5rem" > @include("recipes.show.type_univers")</span></li>

    </ul>
</nav>