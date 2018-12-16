{{--Pour chaque univers, on va charger  1 SEULE recette--}}


<section class="hero">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Explorer nos dernières recettes
            </h1>
        </div>
    </div>
</section>


<section class=" bordered-cdg">
    <div class="columns">
		<?php $i = 0;?>

        {{--   -> tout les univers--}}
        @foreach($universcateg as $index=>$c)
			<?php $i = $index + 1;?>


            {{--  -> si la recette n'est pas nulle--}}
            @if($recettes[$i] != null)
                {{-- -> si la categorie correspond à celle de la recette--}}
                @if($recettes[$i]->type_univers == $c->id)
                    <div class="column">
                        @include("recipes.index.excerpt")
                    </div>
                @endif
                {{-- -> Si la recette est nulle--}}
            @else

                {{-- Si l'index de la recette correspond à l'id universcateg--}}
                @if($i == $c->id)

                    <div class="column">
                        @include("recipes.index.empty")
                    </div>
                @endif
            @endif

            @if($i % 4 == 0)

    </div>
    <div class="columns">
        @endif
        @endforeach

    </div>


</section>
