<!-- Image part -->
<div class="has-text-centered" style="clear: both;" id="recipe-pictures">
    @if($picturesOfAuthor->count() > 0)
        <div>
            <a href="{{ $picturesOfAuthor[0]->getUrl() }}"
               data-lightbox="{{ cleanInput($recipe->slug) }}"
               data-title="{{ cleanInput($recipe->title) }}">
                <figure class="image is-square">
                    <picture>
                        <source type="image/webp"
                                srcset="{{ $picturesOfAuthor->first()->getUrl('thumbSquare') }}"
                                class="fit-cover"
                                alt="{{ __('Image of the recipe :') . cleanInput($recipe->title) }}">
                        <img src="{{ $picturesOfAuthor[0]->getUrl() }}"
                             class="fit-cover"
                             alt="{{  __('Image of the recipe :') . cleanInput($recipe->title) }}">
                    </picture>
                </figure>
            </a>
        </div>

        {{--IF THERE IS MORE THAN ONE PICTURE--}}
        @if($picturesOfAuthor->count() > 1)
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
        @include('recipes.show.addPicture')
        {{--        @include('recipes.show.imageWait')--}}
    @endif
</div>


<script>
    import LoginModal from "../../../assets/js/components/modal/LoginModal";

    export default {
        components: {LoginModal}
    }
</script>