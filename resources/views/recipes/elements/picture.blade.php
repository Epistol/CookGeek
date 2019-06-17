<a href="{{route('recipe.show', $recipe->slug)}}">
<?php $img = $recipe->getMedia('images');?>

@if($img->isEmpty())
        <figure class="image is-1by1 ">
            <img class="fit-cover"
                 src="http://via.placeholder.com/300x200?text={{ strip_tags(clean($recipe->title))}}"
                 alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
        </figure>
    @else
        <figure class="image is-1by1 ">
            @if(collect($img->first()->urls)->firstWhere('name', 'normal')['url'] !== "")
                <clazy-load src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}">
                @endif
                @if(collect($img->first()->urls)->firstWhere('name', 'index')['url'] == "")

                    <!-- The image slot renders after the image loads. -->
                        <img class="fit-cover"
                             src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}"
                             alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                    @else
                        <clazy-load
                                src="{{collect($img->first()->urls)->firstWhere('name', 'webp')['url']}}">
                            <!-- The image slot renders after the image loads. -->
                            <img class="fit-cover"
                                 src="{{collect($img->first()->urls)->firstWhere('name', 'webp')['url']}}"
                                 alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                        @endif

                        <!-- The placeholder slot displays while the image is loading. -->
                            <div slot="placeholder">
                                <!-- You can put any component you want in here. -->
                            </div>
                        </clazy-load>
        </figure>
    @endif
</a>
