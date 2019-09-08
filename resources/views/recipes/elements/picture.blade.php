<a href="{{route('recipe.show', $recipe->slug)}}">
    @if($recipe->getBestPicture(true)->isEmpty())
        <figure class="image is-1by1 ">
            <img class="fit-cover"
                 src="http://via.placeholder.com/300x200?text={{ strip_tags($recipe->title)}}"
                 alt="{{ strip_tags($recipe->title) }} / CDG">
        </figure>
    @else
        <figure class="image is-1by1 ">
            @if($recipe->getBestPicture()->first())
                <clazy-load
                        src="{{$recipe->getBestPicture()->first()->getUrl('thumbSquare')}}">
                    <!-- The image slot renders after the image loads. -->
                    <img class="fit-cover image w-6/124x64"
                         src="{{$recipe->getBestPicture()->first()->getUrl('thumbSquare')}}"
                         alt="{{ strip_tags($recipe->title) }} / CDG">

                    <!-- The placeholder slot displays while the image is loading. -->
                    <div slot="placeholder">
                    </div>
                </clazy-load>
            @endif
        </figure>
    @endif
</a>
