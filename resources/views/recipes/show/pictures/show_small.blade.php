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
                 class="fit-cover image w-6/124x64"
                 alt="{{  __('Image of the recipe :') . cleanInput($recipe->title) }}">
        </picture>
    </figure>
</a>
