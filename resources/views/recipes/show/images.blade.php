<!-- Image part -->
<div class="has-text-centered" style="clear: both;">
    {{--If there is any valid picture to show--}}
    {{--At least one--}}
    @if($validPictures->count() > 0)
        {{--if it's the first, we'll show it bigger--}}
        <?php $validPicture = $validPictures->first(); ?>
        <div>
            <a href="{{collect($validPicture->urls)->firstWhere('name', 'normal')['url']}}"
               data-lightbox="{{strip_tags(clean($recette->slug))}}"
               data-title="{{clean($recette->title)}}">
                <figure class="image is-square">
                    <picture>
                        <source type="image/webp"
                                srcset="{{collect($validPicture->urls)->firstWhere('name', 'webp')['url']}}"
                                class="fit-cover"
                                alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                        <img src="{{collect($validPicture->urls)->firstWhere('name', 'normal')['url']}}"
                             class="fit-cover"
                             alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                    </picture>
                </figure>
            </a>
        </div>

        {{--IF THERE IS MORE THAN ONE PICTURE--}}
        @if($validPictures->count() > 1)
            <div style="display: flex;flex-wrap: wrap;">
                @foreach($validPictures as $index => $validPicture)
                    {{--We don't need to load the first picture that already appear--}}
                    @if($index > 0)
                            <?php $img = $validPicture; ?>
                            @include('recipes.elements.tinyPicture')
                    @endif
                @endforeach
            </div>
        @endif


        {{--IF THERE IS 1 NON VALID PICTURE--}}
        @include('recipes.show.imageWait')
        {{--IF THERE IS 0 VALID PICTURES--}}
    @else
        @include('recipes.show.addPicture')
        @include('recipes.show.imageWait')
    @endif
</div>


<script>
    import LoginModal from "../../../assets/js/components/LoginModal";

    export default {
        components: {LoginModal}
    }
</script>