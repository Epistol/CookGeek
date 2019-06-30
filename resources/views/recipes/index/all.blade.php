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
        <div class="columns is-multiline">

            @foreach($recipes as $nombre => $recipe)
                <div class="column is-4">
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
                        <div class="columns is-paddingless is-marginless mini-infos">
                            <div class="column is-4 is-flex-center"><i class="fas fa-clock"
                                                                       style="margin-right:0.5rem"></i><span>{{ $recipe->timeFormat }}</span>
                            </div>
                            <div class="column is-2 is-flex-center">
                                <span>{{ $recipe-> nb_guests ?: 1 }}</span>{{-- {{ $recipe->guest_type ?: "personnes"}}--}}
                                <i class="fas fa-utensils" style="margin-left:0.5rem"></i>
                            </div>
                            <div id="bottom_right_content" class="column is-6 is-flex is-paddingless">
                                {{--Nom de l'univers--}}
                                @php
                                    $univers_data = DB::table('univers')->where('id', $recipe->universes)->first();
                                @endphp
                                @if($univers_data)
                                    @if(strip_tags(clean($univers_data->name)))
                                        <a href="{{ route('univers.show', $univers_data->name) }}"
                                           style='margin-right:0.5rem'>{{ strip_tags(clean(str_limit($univers_data->name, 25, ' ...'))) }}</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</section>
