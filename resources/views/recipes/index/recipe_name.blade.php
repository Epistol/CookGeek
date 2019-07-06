{{--Recettes ayant dans le nom la recherche --}}
<div class="columns is-multiline is-flex" style="margin-top: 2rem; margin-bottom: 2rem;">
    @foreach($recipes as $recipe)
        <?php
        $starsget = (new \App\Search)->explode_star($recipe->id);
        $type = (new \App\TypeRecipe())::where('id', $recipe->type)->firstOrFail();
        ?>
        {{--Séparation en deux du nombre de colonne--}}
        <div class="column is-6">
            {{--Une recette--}}
            <div class="columns is-paddingless is-marginless is-result is-flex">
                @if($recipe->universes->count() > 0)
                    <div class="recipe-category">
                        @include("recipes.show.type_univers_no_tool")
                    </div>
                @endif
                {{--L'image--}}
                <div class="column is-5 to-hover is-marginless is-paddingless">
                    <div class="bottom-right-aligned">
                        <div class="hovered">
                            <a class="tag" style="margin:0.5rem"
                               href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a>
                        </div>
                    </div>
                    {{--TODO : image--}}

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
                                @include('recipes.elements.note')
                            </div>
                        </div>
                        {{--Ingrédients--}}
                        <div class="column is-full" id="ingredients">
                            <p>
                                <b>@lang("recipe.ingredients") : </b>
                                @foreach($recipe->ingredients as $index=>$ing)
                                    <?php
                                    $nom_in = DB::table('ingredients')->where('id', $ing->id_ingredient)->value('name');
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
                            <?php
                            $nom = DB::table('users')->where('id', $recipe->id_user)->value('name');
                            ?>
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
<span>
                 {{ $recipes->links() }}
        </span>



