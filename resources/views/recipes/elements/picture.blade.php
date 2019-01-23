<a href="/recette/{{$recette->slug}}">

    <figure class="image is-1by1 ">
        <?php
        $img = $pictureService->loadFirstRecipePicture($recette);
        ?>
        @if($img == null or empty($img) or $img->isEmpty())
            <img class="fit-cover"
                 src="http://via.placeholder.com/300x200?text={!! strip_tags($recette->title) !!}"
                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
        @else
            @if(collect($img[0])->firstWhere('name', 'index')['url'] == "")
                <clazy-load src="{{collect($img[0])->firstWhere('name', 'normal')['url']}}">
                    <!-- The image slot renders after the image loads. -->
                    <img class="fit-cover"
                         src="{{collect($img[0])->firstWhere('name', 'normal')['url']}}"
                         alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                    @else
                        <clazy-load
                                src="{{collect($img[0])->firstWhere('name', 'index')['url']}}">
                            <!-- The image slot renders after the image loads. -->
                            <img class="fit-cover"
                                 src="{{collect($img[0])->firstWhere('name', 'index')['url']}}"
                                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                        @endif

                        <!-- The placeholder slot displays while the image is loading. -->
                            <div slot="placeholder">
                                <!-- You can put any component you want in here. -->
                            </div>
                        </clazy-load>
            @endif
    </figure>

</a>