{{--Recettes ayant dans le nom la recherche --}}

@foreach($recipes->chunk(2)  as  $recipechunk)

    <div class=" columns is-flex" style="margin-top: 2rem; margin-bottom: 2rem;">

        @foreach ($recipechunk as $recipe)
            <?php
            $starsget = (new \App\Search)->explode_star($recipe->id);
            $type = DB::table('type_recipes')->where('id', $recipe->type)->first();
            ?>
            {{--Séparation en deux du nombre de colonne--}}
            <div class="column is-6">
                {{--Une recette--}}
                <div class="columns is-paddingless is-marginless is-result is-flex">
                    <div class="recipe-category">
                        @include("recipes.show.type_univers_no_tool")
                    </div>
                    {{--L'image--}}
                    <div class="column is-5 to-hover is-marginless is-paddingless">
                        @if(isset($type))
                            <div class="bottom-right-aligned">
                                <div class="hovered">
                                    <a class="tag" style="margin:0.5rem"
                                       href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a>
                                </div>
                            </div>
                        @endif
                        @include('recipes.elements.picture')
                    </div>
                    {{--Les infos--}}
                    <div class="column is-paddingless">
                        <div class="columns is-marginless is-paddingless is-multiline is-mobile right-side-recipe">
                            {{--Titre--}}
                            <div class="column is-full" id="titre">
                                <a href="{{route('recipe.show',$recipe->slug)}}"><h4 class="title">
                                        @php echo str_limit($recipe->title, 20, ' (...)'); @endphp
                                    </h4></a>
                                <div class="rating">
                                    <star-rating :rating="{{intval($recipe->note->avg('note')) || 1}}" :increment="0.5"
                                                 :star-size="20"
                                                 :recipeid="{{$recipe->id}}"></star-rating>
                                </div>
                            </div>
                            {{--Ingrédients--}}
                            <div class="column is-full" id="ingredients">
                                <?php
                                $ingredients = DB::table('recipes_ingredients')
                                    ->where('id_recipe', $recipe->id)->limit(8)
                                    ->get();
                                ?>
                                <p><b>@lang("recipe.ingredients") : </b>
                                    @foreach($ingredients as $index=>$in)
                                        <?php
                                        $nom_in = DB::table('ingredients')->where('id', $in->id_ingredient)->value('name');
                                        ?>
                                        @if($loop->last)
                                            {{str_limit($nom_in, 15, '...')}}
                                        @else
                                            {{str_limit($nom_in, 15, '...')}},
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                            {{--Author--}}
                            <div class="column is-three-quarters" id="author">
                                @include("recipes.index.author")<br/>
                            </div>
                            <div class="column  is-flex-center">
                                <LikeRecipe :recipeid="'{{$recipe->id}}'"
                                            :userid="'{{ Auth::id() }}'"></LikeRecipe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@endforeach
<span>
                 {{ $recipes->links() }}
        </span>



