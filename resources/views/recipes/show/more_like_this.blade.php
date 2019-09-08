@if($related->isEmpty())
    {{--NO RECIPE--}}
@else
    <h2 class="title">
        @lang('recipe.others')
    </h2>

    <section class="bordered-cdg">
        <div class="flex mb-4 is-multiline">
            @foreach($related as $nombre => $recipe)
                <div class="flex-1 w-3/12">
                    <div class="card card-cdg">
                        <div id="medaillon_index">
                            @include('recipes.show.media')
                        </div>

                        <div class="card-image">
                            @include('recipes.index.cardimage')
                        </div>
                        <div class="recipe-header">
                            <p class="card-header-title">
                                <a href="{{route('recipe.show', strip_tags($recipe->slug))}}"
                                   class="home-text">
                                    {{ (str_limit(strip_tags($recipe->title)), 40, ' (...)')  }}
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endif
