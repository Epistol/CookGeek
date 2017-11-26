<div class="breadbg">


    <div class="columns">
        <div class="column is-4">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Recettes</a></li>
                    <li class=""><a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem" href="/{{$recette->getTypeLower()}}">{{$recette->getType()}}</a></li>
                    <li  > <span style="margin-left: 0.5rem" > @include("recipes.show.type_univers")</span></li>

                </ul>
            </nav>
        </div>
        <div class="column is-6 has-text-centered">

            <h1 class="title is-1">{{$recette->title}}</h1>

        </div>
        <div class="column is-2 ">
            {{--// Likes--}}
            @include('recipes.likeh')
        </div>
    </div>





</div>