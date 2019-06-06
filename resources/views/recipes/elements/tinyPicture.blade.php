<div class="recipe-other-picture">

    <a href="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}"
       data-lightbox="{{strip_tags(clean($recipe->slug))}}" data-title="{{strip_tags(clean($recipe->title))}}">

        <figure class="image">
            @if(collect($img)->isEmpty())
                <img class="fit-cover image is-64x64"
                     src="http://via.placeholder.com/300x200?text={{ strip_tags(clean($recipe->title)) }}"
                     alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
            @else
                @if(collect($img->urls)->firstWhere('name', 'webp')['url'] == "")
                    <clazy-load src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}">
                        <!-- The image slot renders after the image loads. -->

                        <img class="fit-cover image is-64x64"
                             src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}"
                             alt="{{ strip_tags(clean($recipe->title)) }} / CDG">
                        @else

                            <clazy-load
                                    src="{{collect($img->urls)->firstWhere('name', 'webp')['url']}}">
                                <!-- The image slot renders after the image loads. -->
                                <picture>
                                    <source type="image/webp"
                                            srcset="{{collect($img->urls)->firstWhere('name', 'webp')['url']}}"
                                            class="fit-cover"
                                            alt="@lang('recipe.picture-of') : {{strip_tags(clean($recipe->title))}}">
                                    <img src="{{collect($img->urls)->firstWhere('name', 'normal')['url']}}"
                                         class="fit-cover image is-64x64"
                                         alt="@lang('recipe.picture-of') : {{strip_tags(clean($recipe->title))}}">
                                </picture>
                            @endif

                            <!-- The placeholder slot displays while the image is loading. -->
                                <div slot="placeholder">
                                    @lang('common.loading') ...
                                </div>
                            </clazy-load>
                @endif
        </figure>

    </a>
</div>
