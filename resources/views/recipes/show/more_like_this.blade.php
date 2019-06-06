@if($related->isEmpty())
    {{--NO RECIPE--}}
@else
    <h2 class="title">
        Autres recettes à essayer :
    </h2>

    <section class="bordered-cdg">
        <div class="columns is-multiline">
            @foreach($related as $nombre => $recipe)

                <?php

                if ($recipe->getMedia()->isNotEmpty()) {
                    $img = $recipe->getMedia()->first();
                    if (collect($img->urls)->firstWhere('name', 'webp')['url']) {
                        $urlClazy = collect($img->urls)->firstWhere('name', 'webp')['url'];
                    } else {
                        $urlClazy = collect($img->urls)->firstWhere('name', 'normal')['url'];
                    }
                } else {
                    $urlClazy = collect();
                }
                ?>

                <div class="column is-3">
                    <div class="card card-cdg">
                        <div id="medaillon_index">
                            @include('recipes.show.media')
                        </div>

                        <div class="card-image">
                            @include('recipes.index.cardimage')
                        </div>
                        <div class="recipe-header">
                            <p class="card-header-title">
                                <a href="{{route('recipe.show', strip_tags(clean($recipe->slug)))}}"
                                   class="home-text">
                                    {{ (str_limit(strip_tags(clean($recipe->title)), 40, ' (...)'))  }}
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endif
