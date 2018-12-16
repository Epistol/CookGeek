<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="{{route("univers.index")}}">Univers</a></li>
        <li class="is-active"><a href="{{route("univers.show",$univers->id)}}">{{$univers->name}}</a></li>
    </ul>
</nav>