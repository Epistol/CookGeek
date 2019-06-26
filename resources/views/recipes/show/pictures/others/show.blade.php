{{-- Search for validated pictures from other users--}}
@if($recipe->getNonAuthorPictures(true)->isNotEmpty())
    @foreach($recipe->getNonAuthorPictures(true) as $index => $validPicture)
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
@endif