{{--Recettes ayant dans le nom la recherche --}}

<div class="flex flex-wrap mb-4 is-multiline my-8">
    @foreach ($recipes as $i => $recipe)
        <?php
        $starsget = (new \App\Search)->explode_star($recipe->id);
        $type = DB::table('type_recipes')->where('id', $recipe->type)->first();
        ?>
        <div class="flex-1 w-6/12  ">
            <div class="is-result">
                <div class="flex mb-4 m-0">
                    <div class="flex-1 w-4/12 to-hover  m-0">
                        @if(isset($type))
                            <div class="hovered">
                                <a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem"
                                   href="{{route('type.show', strtolower($type->name))}}">{{ $type->name }} </a>
                            </div>
                        @endif
                        @include('recipes.elements.picture')
                    </div>
                    <div class="flex-1 w-8/12 ">
                        <div class="top is-flex">
                            @include("recipes.show.type_univers")

                            <a href="{{route('recipe.show', $recipe->slug)}}" style="margin-left: 2%">
                                <h2 class="title">
                                    {{ strip_tags($recipe->title)}}
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
                                    {{ str_limit(strip_tags($nom_in), 20, "...") }},
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="flex-1 is-offset-4 w-4/12">
                        <div class="is-flex">
                            @include('recipes.elements.note')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<span>
                 {{ $recipes->links() }}
        </span>
