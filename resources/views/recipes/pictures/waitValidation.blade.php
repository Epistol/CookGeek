<div id="picture-zone-validation-wait" class="is-flex-center">

    @if(collect($img)->isNotEmpty())
        <a href="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}"
           data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{strip_tags(clean($recette->title))}}">
            @else
                <a href="" data-lightbox="" data-title="{{strip_tags(clean($recette->title))}}">
                    @endif
                    <figure class="image is-64x64">

                        @if(collect($img)->isEmpty())
                            <img class="fit-cover image is-64x64"
                                 src="http://via.placeholder.com/300x200?text={{ strip_tags(clean($recette->title)) }}"
                                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                        @else
                            @if(collect($img->urls)->firstWhere('name', 'webp')['url'] == "")
                                <clazy-load src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}">
                                    <!-- The image slot renders after the image loads. -->
                                    <img class="fit-cover image is-64x64 tovalidate"
                                         src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}"
                                         alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                                    @else

                                        <clazy-load
                                                src="{{collect($img->urls)->firstWhere('name', 'webp')['url']}}">
                                            <!-- The image slot renders after the image loads. -->
                                            <img class="fit-cover image is-64x64 tovalidate"
                                                 src="{{collect($img->urls)->firstWhere('name', 'webp')['url']}}"
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
                <p>En attente de validation</p>
</div>