<!--{{--Pour chaque univers, on va charger  1 SEULE recette--}}-->
<section class="category-split">
    <section class="hero">
        <div class="" style="padding:1rem">
            <div class="">
                <h2 class="title">
                    Tendances :
                </h2>
            </div>
        </div>
    </section>
    <section class="bordered-cdg">
        <div class="flex flex-no-wrap sm:flex-wrap mb-4 ">
            @foreach($recipes as $index => $recipe)
                <div class="flex-1 w-1/3 md:w-4/12" id="recipe-{{$index}}">
                    <div class="text-gray-700 text-center bg-gray-400 p-2">
                        <div class="card card-cdg">
                            <div id="medaillon_index">
                                @include('recipes.show.media')
                            </div>
                            <div class="card-image">
                                @include('recipes.index.cardimage')
                            </div>
                        </div>
                        <div class="recipe-index-description break-more" id="checkbutton">
                            <p class="card-header-title">
                                <a href="{{route('recipe.show', strip_tags($recipe->slug))}}"
                                   class="home-text">
                                    {{ (str_limit(strip_tags($recipe->title), 40, ' (...)'))  }}
                                </a>
                            </p>
                            <div class="flex mb-4  m-0 mini-infos">
                                <div class="flex-1 w-4/12 is-flex-center"><i class="fas fa-clock"
                                                                             class='mr-2'></i><span>{{ $recipe->timeFormat }}</span>
                                </div>
                                <div class="flex-1 w-2/12 is-flex-center">
                                    <span>{{ $recipe-> nb_guests ?: 1 }}</span>{{-- {{ $recipe->guest_type ?: "personnes"}}--}}
                                    <i class="fas fa-utensils" class='mr-2'></i>
                                </div>
                                <div id="bottom_right_content" class="flex-1 w-6/12 is-flex ">
                                    {{--Nom de l'univers--}}
                                    @if($recipe->universes->count() > 0)
                                        @foreach($recipe->universes as $universe)
                                            @if(strip_tags($universe->name))
                                                <a href="{{ route('univers.show', $universe->name) }}"
                                                   class='mr-2'>{{ strip_tags(str_limit($universe->name, 25, ' ...')) }}</a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
</section>
