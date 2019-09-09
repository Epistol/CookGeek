{{--Recettes ayant dans le nom la recherche --}}
<div class="flex flex-wrap mb-4 my-8">
    @foreach($recipes as $recipe)
        <?php
        $starsget = (new \App\Search)->explode_star($recipe->id);
        ?>
        {{--Séparation en deux du nombre de colonne--}}
        <div class="flex-1 w-10/12">
            {{--Une recette--}}
            <div class="flex mb-4 m-0 is-result is-flex">
                @if($recipe->universes->count() > 0)
                    <div class="recipe-category">
                        @include("recipes.show.type_univers")
                    </div>
                @endif
                {{--L'image--}}
                <div class="flex-1 w-5/12 to-hover m-0 ">
                    <div class="bottom-right-aligned">
                        <div class="hovered">
                            <a class="tag" style="margin:0.5rem"
                               href="{{route("type.show", lcfirst($recipe->types->name))}}">
                                {{$recipe->types->name}}</a>
                        </div>
                    </div>
                    {{--TODO : image--}}
                    @include('recipes.elements.picture')
                </div>
                {{--Les infos--}}
                <div class="flex-1">
                    <div class="flex mb-4 m-0  is-multiline is-mobile right-side-recipe">
                        {{--Titre--}}
                        <div class="flex-1 is-full" id="titre">
                            <a href="{{route('recipe.show',$recipe->slug)}}"><h4 class="title">
                                    @php echo str_limit($recipe->title, 20, ' (...)'); @endphp
                                </h4></a>
                            <div class="rating">
                                @include('recipes.elements.note')
                            </div>
                        </div>
                        {{--Ingrédients--}}
                        <div class="flex-1 is-full" id="ingredients">
                            <p>
                                <b>@lang("recipe.ingredients") : </b>
                                @foreach($recipe->ingredients as $index=>$ing)
                                    @if($loop->last)
                                        {{str_limit($ing->name, 15, '...')}}
                                    @else
                                        {{str_limit($ing->name, 15, '...')}},
                                    @endif
                                @endforeach
                            </p>
                        </div>
                        {{--Author--}}
                        <div class="flex-1 is-three-quarters" id="author">
                            @include("recipes.index.author")<br/>
                        </div>
                        <div class="flex-1  is-flex-center">
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



