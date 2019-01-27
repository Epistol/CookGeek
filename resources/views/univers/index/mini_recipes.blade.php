<div class="column radiused">
    <div class="columns is-multiline">

        <div class="column is-3">
            @foreach($recettes as $recette)
                <div class="is-flex">
                    <?php   $img = $pictureService->loadRecipePicturesValid($recette); ?>
                    <figure class="image is-64x64 radiused">

                        @if($img == null or empty($img) or $img->isEmpty())
                            <img class="fit-cover"
                                 src="http://via.placeholder.com/300x200?text={!! strip_tags($recette->title) !!}"
                                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                        @else
                            @if(collect($img->first())->firstWhere('name', 'index')['url'] == "")
                                <clazy-load src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}">
                                    <!-- The image slot renders after the image loads. -->
                                    <img class="fit-cover"
                                         src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}"
                                         alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                                    @else
                                        <clazy-load src="{{collect($img->first()->urls)->firstWhere('name', 'index')['url']}}">
                                            <!-- The image slot renders after the image loads. -->
                                            <img class="fit-cover"
                                                 src="{{collect($img->first()->urls)->firstWhere('name', 'index')['url']}}"
                                                 alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                                        @endif

                                        <!-- The placeholder slot displays while the image is loading. -->
                                            <div slot="placeholder">
                                                <!-- You can put any component you want in here. -->
                                            </div>
                                        </clazy-load>
                            @endif
                    </figure>

                    <a href="/recette/{{$recette->slug}}"
                       class="titre_content">{{strip_tags(clean($recette->title))  }}</a>
                </div>

            @endforeach

        </div>
    </div>
</div>


