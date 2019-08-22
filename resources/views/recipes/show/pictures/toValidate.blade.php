<div id="picture-zone-validation-wait" class="is-flex-center">
    <a href="{{$picture->getUrl()}}"
       data-lightbox="{{strip_tags(clean($recipe->slug))}}" data-title="{{strip_tags(clean($recipe->title))}}">
        <?php dd( $picture);?>
        <figure class="image w-6/124x64">
            @if($picture->getUrl('thumbSquare'))
                <clazy-load
                        src="{{$picture->getUrl('thumbSquare')}}">
                    <!-- The image slot renders after the image loads. -->
                    <img class="fit-cover image w-6/124x64 tovalidate"
                         src="{{$picture->getUrl('thumbSquare')}}"
                         alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                    @else
                        <clazy-load src="{{$picture->getUrl()}}">
                            <!-- The image slot render@s after the image loads. -->
                            <img class="fit-cover image w-6/124x64 tovalidate"
                                 src="{{$picture->getUrl()}}"
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
@include('admin.recipes.pictures.validate')
