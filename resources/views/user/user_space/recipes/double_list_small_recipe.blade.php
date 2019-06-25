{{--Recettes ayant dans le nom la recherche --}}

<div class="columns is-multiline" style="margin-top: 2rem; margin-bottom: 2rem;">
    @foreach ($recipes as $i => $recipe)
        <?php
        $starsget = (new \App\Search)->explode_star($recipe->id);
        $type = DB::table('type_recipes')->where('id', $recipe->type)->first();
        ?>
        <div class="column is-6  ">
            <div class="is-result">
                <div class="columns  is-paddingless is-marginless">
                    <div class="column is-4 to-hover is-paddingless is-marginless">
                        @if(isset($type))
                            <div class="hovered">
                                <a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem"
                                   href="{{route('type.show', strtolower($type->name))}}">{{ $type->name }} </a>
                            </div>
                        @endif
                        @include('recipes.elements.picture')
                    </div>
                    <div class="column is-8 ">
                        <div class="top is-flex">
                            @include("recipes.show.type_univers_no_tool")

                            <a href="{{route('recipe.show', $recipe->slug)}}" style="margin-left: 2%">
                                <h2 class="title">
                                    {{ strip_tags(clean($recipe->title))}}
                                </h2></a>
                        </div>
                        <div class="middle">
                            {{-- Ingredients--}}

                            <?php
                            $ingredients = DB::table('recipes_ingredients')
                                ->where('id_recipe', $recipe->id)->limit(5)
                                ->get();
                            ?>
                            <p><b>@lang("recipe.ingredients") : </b>
                                @foreach($ingredients as $index=>$in)
                                    <?php
                                    $nom_in = DB::table('ingredients')->where('id', $in->id_ingredient)->value('name');
                                    ?>
                                    {{ str_limit(strip_tags(clean($nom_in)), 20, "...") }},
                                @endforeach
                            </p>

                        </div>
                    </div>

                </div>
                <div class="columns">
                    <div class="column is-offset-4 is-4">
                        <div class="is-flex">
                            @include('recipes.elements.note')
                        </div>
                    </div>
                    <div class="ccolumn is-flex-center">
                        <LikeRecipe :recipeid="'{{$recipe->id}}'" :userid="'{{ Auth::id() }}'"></LikeRecipe>

                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

<span>
                 {{ $recipes->links() }}
        </span>
