<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Recettes</a></li>
        <li><a href="{{$recette->getTypeLower()}}">{{$recette->getType()}}</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{$recette->title}}</a></li>
    </ul>
</nav>