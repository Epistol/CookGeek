{{--Recettes ayant dans le nom la recherche --}}


<div class="columns is-multiline" style="margin-top: 2rem; margin-bottom: 2rem;">
    @foreach ($recipes as $i => $recette)

		<?php
		$starsget = (new \App\Search)->explode_star($recette->id);
		$type = DB::table('type_recipes')->where('id', $recette->type)->first();
		?>

        <div class="column is-6  ">
            <div class="is-result">
                <div class="columns  is-paddingless is-marginless">
                    <div class="column is-4 to-hover is-paddingless is-marginless">
                        @if(isset($type))
                            <div class="hovered">
                                <a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem"
                                   href="/{{strtolower($type->name)}}">{!!  $type->name!!}</a>
                            </div>
                        @endif
                        <a href="/recette/{{$recette->slug}}">
                            <figure class="image is-1by1 is_recipe_horizontal">
                                @if($recette->id_user != NULL )
									<?php        $firstimg = \App\Http\Controllers\Recipe\RecipesController::load_img($recette);
									?>
                                    <img src="{{ strip_tags(clean($firstimg->first())) }}">
                                @else
                                    {{--<img src="http://via.placeholder.com/300x200?text={!! strip_tags(clean($first->image_name)) !!}">--}}
                                @endif
                            </figure>
                        </a>
                    </div>
                    <div class="column is-8 ">
                        <div class="top is-flex">
							<?php
							$typeuniv = DB::table('categunivers')
								->where('id', '=', $recette->type_univers)
								->first();
							?>

                            @include("recipes.show.type_univers_no_tool")

                            <a href="/recette/{{$recette->slug}}" style="margin-left: 2%"><h2 class="title">
                                    {{ strip_tags(clean($recette->title))}}
                                </h2></a>
                        </div>
                        <div class="middle">
                            {{-- Ingredients--}}

							<?php
							$ingredients = DB::table('recipes_ingredients')
								->where('id_recipe', '=', $recette->id)->limit(5)
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
							<?php
							$stars1 = DB::table('recipe_likes')->where('id_recipe', '=', $recette->id)->avg('note');
							?>
                            <star-rating :rating="{{intval($stars1) || 1}}" :increment="0.5" :star-size="20"
                                         :recipeid="{{$recette->id}}"></star-rating>
                        </div>
                    </div>
                    <div class="ccolumn is-flex-center">
                        <LikeRecipe :recipeid="'{{$recette->id}}'" :userid="'{{ Auth::id() }}'"></LikeRecipe>

                    </div>
                </div>

            </div>
        </div>

    @endforeach
</div>

<span>
                 {{ $recipes->links() }}
        </span>

