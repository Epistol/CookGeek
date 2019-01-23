<a href="/recette/{{$recette->slug}}" data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{strip_tags(clean($recette->title))}}"  >

    <figure class="image  ">
        <?php
        $img = $image;
        ?>
        @if($img == null or empty($img) or collect($img)->isEmpty())
            <img class="fit-cover image is-64x64"
                 src="http://via.placeholder.com/300x200?text={!! strip_tags($recette->title) !!}"
                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
        @else
                @if(collect($img)->firstWhere('name', 'webp')['url'] == "")
                <clazy-load src="{{collect($img)->firstWhere('name', 'normal')['url']}}">
                    <!-- The image slot renders after the image loads. -->
                    <img class="fit-cover image is-64x64"
                         src="{{collect($img)->firstWhere('name', 'normal')['url']}}"
                         alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                    @else

                        <clazy-load
                                src="{{collect($img)->firstWhere('name', 'webp')['url']}}">
                            <!-- The image slot renders after the image loads. -->
                            <img class="fit-cover image is-64x64"
                                 src="{{collect($img)->firstWhere('name', 'webp')['url']}}"
                                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                        @endif

                        <!-- The placeholder slot displays while the image is loading. -->
                            <div slot="placeholder">
                                Loading
                            </div>
                        </clazy-load>
            @endif
    </figure>

</a>