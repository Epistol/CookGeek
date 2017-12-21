{{--Recettes ayant dans le nom la recherche --}}

@foreach($recipe->chunk(2)  as  $recettechunk)


    <div class="columns" style="margin-top: 2rem; margin-bottom: 2rem;">

        @foreach ($recettechunk as $recette)
            <?php


            if(isset($images[$recette->id]) &&
                $images[$recette->id]->recipe_id == $recette->id
                && $images[$recette->id]->user_id == $recette->id_user
            ) {
                $first = $images[$recette->id]->image_name;
            }
            else {
                $first = NULL;
            }

            $starsget = (new \App\Search)->explode_star($recette->id);


            $type = DB::table('type_recipes')->select('name')->where('id', $recette->id)->first();
            ?>

            <div class="column is-6 is-result" style="max-height: 190px;">
                <div class="columns">
                    <div class="column is-4 to-hover is-paddingless is-marginless">
                        <div class="hovered">
                            <a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem" href="/{{strtolower($type->name)}}">{{$type->name}}</a>
                        </div>
                        <figure class="image is-1by1" >
                        @if($recette->id_user != NULL && isset($recette) && isset($first))
                                <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{{$first}}">
                                @else
                                <img src="http://via.placeholder.com/300x200?text={{$recette->title}}">
                                @endif
                            </figure>


                    </div>
                    <div class="column is-7">
                        <div class="top is-flex">
                            <h2 class="title">
                                {{$recette->title}}
                            </h2>


                        </div>
                        <div class="middle">
                            {{-- Ingredients--}}

                            <?php
                            $ingredients =  DB::table('recipes_ingredients')
                                ->where('id_recipe', '=', $recette->id)
                                ->get();
                            ?>
                            <p><b>@lang("recipe.ingredients") : </b>
                                @foreach($ingredients as $index=>$in)
                                    <?php
                                    $nom_in = DB::table('ingredients')->where('id', $in->id_ingredient)->value('name');
                                    ?>
                                    @if($loop->last)
                                        {{$nom_in}}
                                    @else
                                        {{$nom_in}},
                                    @endif
                                @endforeach
                            </p>



                        </div>
                        <div class="bottom">
                            <div class="is-flex">
                                <?php
                                $nom = DB::table('users')->where('id', $recette->id_user)->value('name');
                                ?>
                                @include("recipes.show.author")<br />
                                @include("recipes.show.staronly")
                            </div>
                        </div>

                    </div>
                    <div class="column is-1 is-marginless is-paddingless">
                        <div class="top">
                            <?php
                            $typeuniv = DB::table('categunivers')
                                ->where('id', '=', $recette->type_univers)
                                ->first();
                            ?>
                            @include("recipes.show.type_univers_no_tool")
                        </div>
                        <div class="middle">

                        </div>
                        <div class="bottom">
                            <a class="tag like" data="{{$recette->id}}"><i class="material-icons">favorite</i></a>
                        </div>

                    </div>
                </div>
            </div>


        @endforeach
        <span>
                 {{ $recipe->links() }}
        </span>

    </div>


@endforeach


