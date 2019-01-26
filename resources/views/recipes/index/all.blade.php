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
            $validPictures = $picturectrl->loadRecipePicturesValid($recette);
            if ($validPictures->isNotEmpty()) {
                $img = $validPictures->first();
                if (collect($img->urls)->firstWhere('name', 'webp')['url']) {
                    $urlClazy = collect($img->urls)->firstWhere('name', 'webp')['url'];
                } else {
                    $urlClazy = collect($img->urls)->firstWhere('name', 'normal')['url'];
                }
            } else {
                $urlClazy = collect();
            }
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
                                        @include('recipes.index.cardimage')
                                    </div>
                                    <div class="recipe-header">
                                        <p class="card-header-title">
                                            <a href="{{route('recipe.show', strip_tags(clean($recette->slug)))}}"
                                               class="texte_accueil">
                                                {{ (str_limit(strip_tags(clean($recette->title)), 40, ' (...)'))  }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="columns is-paddingless is-marginless mini-infos">
                                        <div class="column is-4 is-flex-center"><i class="fas fa-clock"
                                                                                   style="margin-right:0.5rem"></i><span>{{ strip_tags($somme) }}</span>
                                        </div>
                                        <div class="column is-2 is-flex-center">
                                            <span>{!! $recette-> nb_guests ?: 1 !!}</span>{{-- {{ $recette->guest_type ?: "personnes"}}--}}
                                            <i class="fas fa-utensils" style="margin-left:0.5rem"></i>
                                        </div>
                                        <div id="bottom_right_content" class="column is-6 is-flex is-paddingless">
                                            {{--Nom de l'univers--}}
                                            @php
                                                $univers_data = DB::table('univers')->where('id', '=', $recette->univers)->first();
                                            @endphp
                                            @if($univers_data)
                                                <a href="{!! route('univers.show', $univers_data->id) !!}"
                                                   style='margin-right:0.5rem'>{{ strip_tags(clean(str_limit($univers_data->name, 25, ' ...'))) }}</a>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                            @if($nombre % 4 === 3)
                    </div>
            @endif
        @endforeach


    </section>
</section>
