<a href="{{ $validPicture->getUrl() }}"
   data-lightbox="{{ cleanInput($recipe->slug) }}"
   data-title="{{ cleanInput($recipe->title) }}">
    <figure class="image is-square">
        <picture>
            <source type="image/webp"
                    srcset="{{ $validPicture->getUrl('thumbSquare') }}"
                    class="fit-cover"
                    alt="{{ __('Image of the recipe :') . cleanInput($recipe->title) }}">
            <img src="{{ $validPicture->getUrl('thumb') }}"
                 class="fit-cover image"
                 alt="{{  __('Image of the recipe :') . cleanInput($recipe->title) }}">
        </picture>
    </figure>
</a>
