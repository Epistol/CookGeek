<a href="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}" data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{strip_tags(clean($recette->title))}}"  >

    <figure class="image">

        @if(collect($img)->isEmpty())
            <img class="fit-cover image is-64x64"
                 src="http://via.placeholder.com/300x200?text={{ strip_tags(clean($recette->title)) }}"
                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
        @else
                @if(collect($img->urls)->firstWhere('name', 'webp')['url'] == "")
                <clazy-load src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}">
                    <!-- The image slot renders after the image loads. -->

                    <img class="fit-cover image is-64x64"
                         src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}"
                         alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                    @else

                        <clazy-load
                                src="{{collect($img->urls)->firstWhere('name', 'webp')['url']}}">
                            <!-- The image slot renders after the image loads. -->
                            <picture>
                                <source type="image/webp"
                                        srcset="{{collect($img->urls)->firstWhere('name', 'webp')['url']}}"
                                        class="fit-cover"
                                        alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                                <img src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}"
                                     class="fit-cover image is-64x64"
                                     alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                            </picture>
                        @endif

                        <!-- The placeholder slot displays while the image is loading. -->
                            <div slot="placeholder">
                                Loading
                            </div>
                        </clazy-load>
            @endif
    </figure>

</a>