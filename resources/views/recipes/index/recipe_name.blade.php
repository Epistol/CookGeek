{{--Recettes ayant dans le nom la recherche --}}

@foreach($recipes->chunk(2)  as  $recettechunk)

    <div class=" columns is-flex" style="margin-top: 2rem; margin-bottom: 2rem;">

        @foreach ($recettechunk as $recette)

			<?php
			$img = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->first();
			$first = $img;
			$starsget = (new \App\Search)->explode_star($recette->id);
			$type = DB::table('type_recipes')->where('id', $recette->type)->first();
			?>
            {{--Séparation en deux du nombre de colonne--}}
            <div class="column is-6">
                {{--Une recette--}}
                <div class="columns is-paddingless is-marginless is-result is-flex">
                    <div class="categ_recette">
						<?php
						$typeuniv = DB::table('categunivers')
							->where('id', '=', $recette->type_univers)
							->first();
						?>
                        @include("recipes.show.type_univers_no_tool")
                    </div>
                    {{--L'image--}}
                    <div class="column is-5 to-hover is-marginless is-paddingless">
                        @if(isset($type))
                            <div class="aligned_bottom_right">
                                <div class="hovered">
                                    <a class="tag" style="margin:0.5rem"
                                       href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a>
                                </div>
                            </div>
                        @endif
                        <a href="/recette/{{$recette->slug}}">
                            <figure class="image is-1by1">
                                @if($recette->id_user != NULL  && isset($first))
                                    <clazy-load
                                            src="{{url("/recipes/".$recette->id."/".$recette->id_user."/".$first->image_name)}}">
                                        <!-- The image slot renders after the image loads. -->
                                        <img class="fit-cover"
                                             src="{{url("/recipes/".$recette->id."/".$recette->id_user."/".$first->image_name)}}"
                                             alt="{!! strip_tags($recette->title) !!} / CDG"
                                             style="-webkit-border-radius: 15px 0 0 15px;
border-radius: 15px 0 0 15px;">
                                        <!-- The placeholder slot displays while the image is loading. -->
                                        <div slot="placeholder">
                                            <!-- You can put any component you want in here. -->
                                        </div>
                                    </clazy-load>

                                @else
                                    <img class="fit-cover"
                                         src="http://via.placeholder.com/300x200?text={{strip_tags(clean($recette->title))}}" alt="{{strip_tags(clean($recette->title))}}" style="-webkit-border-radius: 15px 0 0 15px; border-radius: 15px 0 0 15px;">
                                @endif
                            </figure>
                        </a>
                    </div>
                    {{--Les infos--}}
                    <div class="column is-paddingless">
                        <div class="columns is-marginless is-paddingless is-multiline is-mobile right_side_recipe">
                            {{--Titre--}}
                            <div class="column is-full" id="titre">
                                <a href="{{url('/recette/'.$recette->slug)}}"><h4 class="title">
                                        @php echo str_limit($recette->title, 20, ' (...)'); @endphp
                                    </h4></a>
								<?php
								$stars = DB::table('recipe_likes')->where('id_recipe', '=', $recette->id)->avg('note');
								if($stars === null) {
									$stars = 0;
								}
								?>
                                <div class="rating">
                                    <star-rating :rating="{{$stars}}" :increment="0.5" :star-size="20"
                                                 :recipeid="{{$recette->id}}"></star-rating>
                                </div>
                            </div>
                            {{--Ingrédients--}}
                            <div class="column is-full" id="ingredients">
								<?php
								$ingredients = DB::table('recipes_ingredients')
									->where('id_recipe', '=', $recette->id)->limit(8)
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
								<?php
								$nom = DB::table('users')->where('id', $recette->id_user)->value('name');
								?>
                                @include("recipes.index.author")<br/>
                            </div>
                            <div class="column  is-flex-center">
                                <LikeRecipe :recipeid="'{{$recette->id}}'"
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



