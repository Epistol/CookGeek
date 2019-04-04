<!-- Image part -->
<div class="has-text-centered" style="clear: both;" id="recipe-pictures">
    @if($pictures->count() > 0)
        <div>
            <a href="{{ $pictures->getFirstMediaUrl() }}"
               data-lightbox="{{strip_tags(clean($recette->slug))}}"
               data-title="{{clean($recette->title)}}">
                <figure class="image is-square">
                    <picture>
                        <source type="image/webp"
                                srcset="{{$pictures->first()->getUrl('thumbSquare')}}"
                                class="fit-cover"
                                alt="{{ __('Image of the recipe :') . strip_tags(clean($recette->title))}}">
                        <img src="{{$pictures->getFirstMediaUrl()}}"
                             class="fit-cover"
                             alt="{{  __('Image of the recipe :') . strip_tags(clean($recette->title))}}">
                    </picture>
                </figure>
            </a>
        </div>

        {{--IF THERE IS MORE THAN ONE PICTURE--}}
        @if($pictures->count() > 1)
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
        @include('recipes.show.imageWait')
        {{--IF THERE IS 0 VALID PICTURES--}}
    @else
        @include('recipes.show.addPicture')
        @include('recipes.show.imageWait')
    @endif
</div>


<script>
    import LoginModal from "../../../assets/js/components/modal/LoginModal";

    export default {
        components: {LoginModal}
    }
</script>