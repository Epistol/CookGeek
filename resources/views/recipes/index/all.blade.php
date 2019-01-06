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

        @foreach($recipes as $nombre => $recette)
			<?php
			$somme_t = $recette->prep_time + $recette->cook_time + $recette->rest_time;
			$somme = $controller->sum_time_home($somme_t);
			?>
            @if($nombre % 4 === 0)
                <div class="columns">
                    <div class="column is-3">
                        @else
                            <div class="column is-3">
                                @endif
                                <div class="card card-cdg">

                                    <div id="medaillon_index">
                                        @include('recipes.show.media')
                                    </div>

                                    <div class="card-image">
                                        <a href="/recette/{{$recette->slug}}">
                                            <figure class="image is-16by9 ">
												<?php
												$img = DB::table('recipe_imgs')->where('user_id', '=', $recette->id_user)->where('recipe_id', '=', $recette->id)->first();
												?>
                                                @if($img == null or empty($img))
                                                    <img class="fit-cover"
                                                         src="http://via.placeholder.com/300x200?text={{$recette->title}}"
                                                         alt="{{$recette->title}} / CDG">
                                                @else
                                                    <img class="fit-cover"
                                                         src="{{url("/recipes/".$recette->id."/".$recette->id_user."/".$img->image_name)}}"
                                                         alt="{{$recette->title}} / CDG">
                                                @endif
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="recipe-header">
                                        <p class="card-header-title">
                                            <a href="/recette/{{$recette->slug}}" class="texte_accueil">
                                                @php echo str_limit($recette->title, 70, ' (...)'); @endphp
                                            </a>
                                        </p>
                                    </div>
                                    <div class="columns is-paddingless is-marginless mini-infos">
                                        <div class="column is-4 is-flex-center"><i class="fas fa-clock"
                                                                                   style="margin-right:0.5rem"></i><span>{{$somme}}</span>
                                        </div>
                                        <div class="column is-2 is-flex-center">
                                            <span>{{$recette->nb_guests ?: 1}}</span>{{-- {{ $recette->guest_type ?: "personnes"}}--}}
                                            <i class="fas fa-utensils" style="margin-left:0.5rem"></i>
                                        </div>
                                        <div id="bottom_right_content"  class="column is-6 is-flex is-paddingless" >
                                            {{--Nom de l'univers--}}
                                            @php
                                                $univers_data = DB::table('univers')->where('id', '=', $recette->univers)->first();
                                            @endphp

                                            <a href="{{route('univers.show', $univers_data->id)}}" style='margin-right:0.5rem' >{{str_limit($univers_data->name, 25, ' ...')}}</a>


                                        </div>
                                    </div>


                                </div>
                            </div>
                            @if($nombre % 4 === 3)
                    </div>

                    @endif
                    @endforeach


                </div>


    </section>
</section>
