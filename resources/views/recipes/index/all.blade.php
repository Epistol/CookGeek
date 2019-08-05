<!--{{--Pour chaque univers, on va charger  1 SEULE recette--}}-->
<section class="category-split">
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
        <div class="flex mb-4 is-multiline">

            @foreach($recipes as $nombre => $recipe)
                <div class="flex-1 is-4">
                    <div class="card card-cdg">
                        <div id="medaillon_index">
                            @include('recipes.show.media')
                        </div>

                        <div class="card-image">
                            @include('recipes.index.cardimage')
                        </div>
                    </div>

                    <div class="recipe-index-description " id="checkbutton">
                        <p class="card-header-title">
                            <a href="{{route('recipe.show', strip_tags(clean($recipe->slug)))}}"
                               class="home-text">
                                {{ (str_limit(strip_tags(clean($recipe->title)), 40, ' (...)'))  }}
                            </a>
                        </p>
                        <div class="flex mb-4 is-paddingless m-0 mini-infos">
                            <div class="flex-1 is-4 is-flex-center"><i class="fas fa-clock"
                                                                       style="margin-right:0.5rem"></i><span>{{ $recipe->timeFormat }}</span>
                            </div>
                            <div class="flex-1 is-2 is-flex-center">
                                <span>{{ $recipe-> nb_guests ?: 1 }}</span>{{-- {{ $recipe->guest_type ?: "personnes"}}--}}
                                <i class="fas fa-utensils" style="margin-left:0.5rem"></i>
                            </div>
                            <div id="bottom_right_content" class="flex-1 is-6 is-flex is-paddingless">
                                {{--Nom de l'univers--}}
                                @if($recipe->universes->count() > 0)
                                    @foreach($recipe->universes as $universe)
                                        @if(strip_tags(clean($universe->name)))
                                            <a href="{{ route('univers.show', $universe->name) }}"
                                               style='margin-right:0.5rem'>{{ strip_tags(clean(str_limit($universe->name, 25, ' ...'))) }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</section>
