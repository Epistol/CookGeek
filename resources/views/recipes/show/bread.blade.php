<div class="round_bg">

    <?php $type = DB::table('type_recipes')->where("id", "=", $recette->type)->first();?>

    <div class="columns">
        <div class="column">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="{{route("recipe.index")}}">Recettes</a></li>
                    <li class=""><a class="" style="margin-left: 0.5rem; margin-right:0.5rem"
                                    href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a></li>
                  
                </ul>
            </nav>
        </div>
        <div class="column has-text-centered">

            <h1 class="title ">{{$recette->title}}</h1>

        </div>
        <div class="column ">
            {{--// Likes--}}
            @include('recipes.likeh')
        </div>
    </div>


</div>