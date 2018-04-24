<div class="round_bg">

    <?php $type = DB::table('type_recipes')->where("id", "=", $recette->type)->first();?>

    <div class="columns">
        <div class="column is-4">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="{{route("recipe.index")}}">Recettes</a></li>
                    <li class=""><a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem"
                                    href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a></li>
                    <li>
                        <div style="margin-left: 0.5rem"> @include("recipes.show.type_univers")</div>
                    </li>

                </ul>
            </nav>
        </div>
        <div class="column is-5 has-text-centered">

            <h1 class="title ">{{$recette->title}}</h1>

        </div>
        <div class="column is-2 ">
            {{--// Likes--}}
            @include('recipes.likeh')
        </div>
    </div>


</div>