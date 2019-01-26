<a href="/recette/{{strip_tags(clean($recette->slug))}} ">
    <figure class="image is-16by9 ">
        @if($validPictures->isEmpty())
            <img class="fit-cover"
                 src="http://via.placeholder.com/300x200?text={!! strip_tags($recette->title) !!}"
                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
        @else
            @if($validPictures->isNotEmpty())
                <clazy-load
                        src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}">
                    <!-- The image slot renders after the image loads. -->
                    <img class="fit-cover"
                         src="{{$urlClazy}}"
                         alt="{{ strip_tags(clean($recette->title)) }} / CDG">

                    <!-- The placeholder slot displays while the image is loading. -->
                    <div slot="placeholder">
                        <!-- You can put any component you want in here. -->
                    </div>
                </clazy-load>
            @endif
        @endif
    </figure>
</a>