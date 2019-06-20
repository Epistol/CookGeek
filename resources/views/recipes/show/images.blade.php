<!-- Image part -->
<div class="has-text-centered" style="clear: both;" id="recipe-pictures">
    @if($recipe->getAuthorPictures(true)->isNotEmpty())
        <?php dd($recipe->getAuthorPictures(true));?>
        <div>
            <a href="{{ $recipe->getAuthorPictures(true)->first()->getUrl() }}"
               data-lightbox="{{ cleanInput($recipe->slug) }}"
               data-title="{{ cleanInput($recipe->title) }}">
                <figure class="image is-square">
                    <picture id="picture">
                        <source type="image/webp"
                                srcset="{{ $recipe->getAuthorPictures(true)->first()->getUrl('thumbSquare') }}"
                                class="fit-cover"
                                alt="{{ __('Image of the recipe :') . cleanInput($recipe->title) }}">
                        <img src="{{ $recipe->getAuthorPictures(true)->first()->getUrl() }}"
                             class="fit-cover"
                             alt="{{  __('Image of the recipe :') . cleanInput($recipe->title) }}">
                    </picture>
                </figure>
            </a>
        </div>

{{--        // TEST--}}
        {{--IF THERE IS MORE THAN ONE PICTURE--}}
        @if($recipe->getAuthorPictures()->count() > 1)
            <div style="display: flex;flex-wrap: wrap;">
                @foreach($validPictures->slice(0) as $index => $validPicture)
                    {{--We don't need to load the first picture that already appear--}}
                    @if($index > 0)
                        @php $img = $validPicture; @endphp
                        @include('recipes.elements.tinyPicture')
                    @endif
                @endforeach
            </div>
        @endif

        {{--IF THERE IS 1 NON VALID PICTURE--}}
        {{--  @include('recipes.show.imageWait')--}}
        {{--IF THERE IS 0 VALID PICTURES--}}
    @else
        @if($recipe->getAuthorPictures()->isNotEmpty())
            @include('recipes.show.imageWait')
        @endif
        @include('recipes.show.addPicture')
    @endif
</div>


<script>
    import LoginModal from "../../../assets/js/components/modal/LoginModal";

    export default {
        components: {LoginModal}
    }
</script>