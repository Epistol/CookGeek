<!--{{--Pour chaque univers, on va charger  1 SEULE recette--}}-->


<section class="split_categ">

    <section class="hero">
        <div class="" style="padding:1rem">
            <div class="">
                <h2 class="title">
                    Explore les dernières recettes :
                </h2>
            </div>
        </div>
    </section>

    <section class="bordered-cdg">
        <div class="columns">
            @foreach($recipes as $recette)
				<?php

				$somme_t = $recette->prep_time + $recette->cook_time + $recette->rest_time;
				$somme = $controller->sum_time($somme_t);
				?>
                <div class="column is-2">
                    <div class="card card-cdg">
                        <header class="card-header">
                            <p class="card-header-title">
                                <a href="/recette/{{$recette->slug}}" class="texte_accueil">{{$recette->title}}</a>
                            </p>
                        </header>
                        <div class="card-image">
                            <figure class="image is-16by9 ">
								<?php
								$img = DB::table('recipe_imgs')->where('user_id', '=', $recette->id_user)->where('recipe_id', '=', $recette->id)->first();
								?>
                                @if($img == null or empty($img))
                                    <img src="http://via.placeholder.com/300x200?text={{$recette->title}}"
                                         alt="{{$recette->title}} / CDG">
                                @else
                                    <img src="{{url("/recipes/".$recette->id."/".$recette->id_user."/".$img->image_name)}}"
                                         alt="{{$recette->title}} / CDG">
                                @endif
                            </figure>
                        </div>
                        <div class="columns is-paddingless is-marginless mini-infos">
                            <div class="column"><i class="fas fa-clock"></i>{{$somme}}</div>
                            <div class="column"><i class="fas fa-utensils"></i> X personnes</div>
                            <div class="column">icon univers</div>
                        </div>

                        <!-- <div class="card-content">
                            <div class="content">
                                <span class="ingr_title">Ingredients</span>
                                <ul>
									<?php
	                                /*$ingredients = DB::table('recipes_ingredients')->where('id_recipe', '=', $recette->id)
		                                ->join('ingredients', 'recipes_ingredients.id_ingredient', '=', 'ingredients.id')
		                                ->get();*/
									?>
                                    {{--@foreach($ingredients as $ingredient)--}}
                                    <li>
                                        {{--{{ $ingredient->qtt }} {{ $ingredient->name }}--}}
                                    </li>
                                        {{--@endforeach--}}
                                </ul>
                               {{-- <pre>
                                {{$recette->commentary_author}}
                               </pre>--}}
                            </div>
                        </div> -->
                    </div>
                </div>
            @endforeach
        </div>


    </section>
</section>
