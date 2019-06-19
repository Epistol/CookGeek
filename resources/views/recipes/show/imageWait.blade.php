<div id="picture-zone-validation-wait" class="is-flex-center">
    <a href="{{$recipe->getAuthorPictures()->first()->getUrl()}}"
       data-lightbox="{{strip_tags(clean($recipe->slug))}}" data-title="{{strip_tags(clean($recipe->title))}}">
        <figure class="image is-64x64">
            @if($recipe->getAuthorPictures()->first()->getUrl())
                <clazy-load src="{{$recipe->getAuthorPictures()->first()->getUrl()}}">
                    <!-- The image slot renders after the image loads. -->
                    <img class="fit-cover image is-64x64 tovalidate"
                         src="{{$recipe->getAuthorPictures()->first()->getUrl()}}"
                         alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                    @else

                        <clazy-load
                                src="{{$recipe->getAuthorPictures()->first()->getUrl('webp')}}">
                            <!-- The image slot renders after the image loads. -->
                            <img class="fit-cover image is-64x64 tovalidate"
                                 src="{{$recipe->getAuthorPictures()->first()->getUrl('webp')}}"
                                 alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                        @endif

                        <!-- The placeholder slot displays while the image is loading. -->
                            <div slot="placeholder">
                            </div>
                        </clazy-load>
        </figure>
    </a>
    <p>En attente de validation</p>
</div>
