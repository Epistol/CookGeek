@if($related->isEmpty())
    {{--NO RECIPE--}}
@else
    <h2 class="title">
        Autres recettes à essayer :
    </h2>

    <section class="bordered-cdg">
        <div class="columns is-multiline">
            @foreach($related as $nombre => $recette)

                <?php
                $validPictures = App\RecipeImg::loadRecipePicturesValid($recette);

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
                                <a href="{{route('recipe.show', strip_tags(clean($recette->slug)))}}"
                                   class="home-text">
                                    {{ (str_limit(strip_tags(clean($recette->title)), 40, ' (...)'))  }}
                                </a>
                            </p>
                        </div>
                        {{--<div class="columns is-paddingless is-marginless mini-infos">

                            <div id="bottom_right_content" class="column is-6 is-flex is-paddingless">
                                --}}{{--Nom de l'univers--}}{{--
                                @php
                                    $univers_data = DB::table('univers')->where('id', '=', $recette->univers)->first();
                                @endphp
                                @if($univers_data)
                                    <a href="{!! route('univers.show', $univers_data->id) !!}"
                                       style='margin-right:0.5rem'>{{ strip_tags(clean(str_limit($univers_data->name, 25, ' ...'))) }}</a>
                                @endif
                            </div>
                        </div>--}}
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endif
