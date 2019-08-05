<div class="flex-1 radiused">
    <div class="flex mb-4 is-multiline">

        <div class="flex-1 is-3">
            @foreach($recipes as $recipe)
                <div class="is-flex">
                    <?php   $img = $pictureService->loadRecipePicturesValid($recipe); ?>
                    <figure class="image is-64x64 radiused">

                        @if($img == null or empty($img) or $img->isEmpty())
                            <img class="fit-cover"
                                 src="http://via.placeholder.com/300x200?text={{strip_tags($recipe->title)}}"
                                 alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                        @else
                            @if(collect($img->first())->firstWhere('name', 'index')['url'] == "")
                                <clazy-load src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}">
                                    <!-- The image slot renders after the image loads. -->
                                    <img class="fit-cover"
                                         src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}"
                                         alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                                    @else
                                        <clazy-load src="{{collect($img->first()->urls)->firstWhere('name', 'index')['url']}}">
                                            <!-- The image slot renders after the image loads. -->
                                            <img class="fit-cover"
                                                 src="{{collect($img->first()->urls)->firstWhere('name', 'index')['url']}}"
                                                 alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                                        @endif

                                        <!-- The placeholder slot displays while the image is loading. -->
                                            <div slot="placeholder">
                                                <!-- You can put any component you want in here. -->
                                            </div>
                                        </clazy-load>
                            @endif
                    </figure>

                    <a href="{{route('recipe.show', $recipe->slug)}}"
                       class="content-title">{{strip_tags(clean($recipe->title))  }}</a>
                </div>

            @endforeach

        </div>
    </div>
</div>


