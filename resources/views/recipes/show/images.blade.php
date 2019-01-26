<!-- Image part -->
<div class=" has-text-centered">
    @if($validPictures->count() > 0  )
        @foreach($validPictures as $validPicture)

            {{--// TODO : EN COURS--}}
            <?php dd(collect($validPicture->urls)->firstWhere('name', 'normal'))?>

            <a href="{{$validPictures->firstWhere('name', 'normal')['url']}}"
               data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{clean($recette->title)}}">
                <figure class="image is-square">
                    <picture>
                        <source type="image/webp"
                                srcset="{{collect($validPictures->first())->where('user' , $recette->id_user)->firstWhere('name', 'webp')['url']}}"
                                class="fit-cover" alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                        <img src="{{collect($validPictures->first())->where('user' , $recette->id_user)->firstWhere('name', 'normal')['url']}}"
                             class="fit-cover" alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                    </picture>
                </figure>
            </a>


            @if($validPictures->count() > 1)
                <ul style="float: left;">
                    @foreach($validPictures as $image)
                        <li style="float: left;">
                            @include('recipes.elements.tinyPicture')</li>
                    @endforeach
                </ul>

                @include('recipes.show.addPicture')
            @else
                @include('recipes.show.addPicture')
            @endif
        @endforeach
    @else

        {{--NO PICTURE --}}
        @include('recipes.show.addPicture')
    @endif

</div>
<script>
    import LoginModal from "../../../assets/js/components/LoginModal";

    export default {
        components: {LoginModal}
    }
</script>