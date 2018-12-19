{{--Recettes ayant dans le nom la recherche --}}

@foreach($recipes->chunk(2)  as  $recettechunk)


    <div class="columns" style="margin-top: 2rem; margin-bottom: 2rem;">

        @foreach ($recettechunk as $recette)

			<?php
			$img = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->first();
			$first = $img;
			$starsget = (new \App\Search)->explode_star($recette->id);
			$type = DB::table('type_recipes')->where('id', $recette->type)->first();

			?>

            <div class="column is-6 is-result ">
                <div class="columns ">
                    <div class="column is-4 to-hover is-marginless is-paddingless">
                        @if(isset($type))
                            <div class="hovered">
                                <a class="tag" style="margin:0.5rem"
                                   href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a>
                            </div>
                        @endif
                        <a href="/recette/{{$recette->slug}}">
                            <figure class="image is-1by1">
                                @if($recette->id_user != NULL  && isset($first))
                                    <img class="fit-cover" src="{{url("/recipes/".$recette->id."/".$recette->id_user."/".$first->image_name)}}" style="-webkit-border-radius: 15px 0 0 15px;
border-radius: 15px 0 0 15px;">
                                @else
                                    <img class="fit-cover" src="http://via.placeholder.com/300x200?text={{$recette->title}}" style="-webkit-border-radius: 15px 0 0 15px;
border-radius: 15px 0 0 15px;">
                                @endif
                            </figure>
                        </a>

                    </div>
                    <div class="column is-7 is-paddingless">
                        <div class="top is-flex">
                            <a href="{{url('/recette/'.$recette->slug)}}"><h2 class="title">

                                    @php echo str_limit($recette->title, 20, ' (...)'); @endphp

                                </h2></a>


                        </div>

                        <div class="middle">
                            {{-- Ingredients--}}

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
                        <div class="bottom is-flex">
                                <span>
                                    <?php
	                                $nom = DB::table('users')->where('id', $recette->id_user)->value('name');
	                                ?>
                                    @include("recipes.index.author")<br/>
                                </span>

                                <span style="padding-left:1rem"> @include("recipes.show.staronly")</span>
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
                            <like-recipe :recipeid="'{{$recette->id}}'" :userid="'{{ Auth::id() }}'"></like-recipe>
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

