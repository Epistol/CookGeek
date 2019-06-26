{{--        Load the first picture of author--}}
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
{{--If there is more than one picture valid from author--}}
@if($recipe->getAuthorPictures(true)->count() > 1)
    <div style="display: flex;flex-wrap: wrap;">
        {{--                Load the others pictures valid from author--}}
        @foreach($recipe->getAuthorPictures(true, 1) as $index => $validPicture)
            {{--We don't need to load the first picture that already appear--}}
            <a href="{{ $validPicture->getUrl() }}"
               data-lightbox="{{ cleanInput($recipe->slug) }}"
               data-title="{{ cleanInput($recipe->title) }}">
                <figure class="image">
                    <picture>
                        <source type="image/webp"
                                srcset="{{ $validPicture->getUrl('thumbSquare') }}"
                                class="fit-cover"
                                alt="{{ __('Image of the recipe :') . cleanInput($recipe->title) }}">
                        <img src="{{ $validPicture->getUrl('thumb') }}"
                             class="fit-cover image is-64x64"
                             alt="{{  __('Image of the recipe :') . cleanInput($recipe->title) }}">
                    </picture>
                </figure>
            </a>
        @endforeach
    </div>
@endif