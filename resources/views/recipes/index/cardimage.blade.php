<a href="{{route('recipe.show', strip_tags(clean($recipe->slug)))}}">
    <figure class="image is-16by9 ">
        @if($recipe->getMedia()->isEmpty())
            <img class="fit-cover img-radius"
                 src="http://via.placeholder.com/300x200?text={!! strip_tags($recipe->title) !!}"
                 alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
        @else
            @if($recipe->getMedia()->isNotEmpty())
                <clazy-load
                        src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}">
                    <!-- The image slot renders after the image loads. -->
                    <img class="fit-cover img-radius"
                         src="{{$urlClazy}}"
                         alt="{{ strip_tags(clean($recipe->title)) }} / CDG">

                    <!-- The placeholder slot displays while the image is loading. -->
                    <div slot="placeholder">
                        <!-- You can put any component you want in here. -->
                    </div>
                </clazy-load>
            @endif
        @endif
    </figure>
</a>