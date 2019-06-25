<!-- Image part -->
<div class="has-text-centered" style="clear: both;" id="recipe-pictures">
    @if($recipe->getAuthorPictures(true)->isNotEmpty())
        <div>
            <a href="{{ $recipe->getAuthorPictures(true)->first()->getUrl() }}"
               data-lightbox="{{ cleanInput($recipe->slug) }}"
               data-title="{{ cleanInput($recipe->title) }}">
                <figure class="image is-square">
                    <picture id="picture">
                        <source type="image/webp"
                                srcset="{{ $recipe->getAuthorPictures(true)->first()->getUrl('thumbSquare') }}"
                                class="fit-cover"
                                alt="{{ __('Image of the recipe :') . cleanInput($recipe->title) }}">
                        <img src="{{ $recipe->getAuthorPictures(true)->first()->getUrl() }}"
                             class="fit-cover"
                             alt="{{  __('Image of the recipe :') . cleanInput($recipe->title) }}">
                    </picture>
                </figure>
            </a>
        </div>

        {{--IF THERE IS MORE THAN ONE PICTURE--}}
        @if($recipe->getAuthorPictures()->count() > 1)
            <div style="display: flex;flex-wrap: wrap;">
                @foreach($recipe->getAuthorPictures()->slice(0) as $index => $validPicture)
                    {{--We don't need to load the first picture that already appear--}}
                    @if($index > 0)
                        @php $img = $recipe->getAuthorPictures(); @endphp
                        @include('recipes.elements.tinyPicture')
                    @endif
                @endforeach
            </div>
        @endif
        @include('recipes.show.addMorePicture')
    @else
        @if($recipe->getAuthorPictures()->isNotEmpty())
            @include('recipes.show.imageWait')
            @include('recipes.show.addMorePicture')
        @endif
        @include('recipes.show.addPicture')
    @endif
</div>