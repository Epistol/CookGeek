<!-- Image part -->
<div class=" has-text-centered">

    @if($firstimg->count() == 1  )

        <a href="{{collect($firstimg->first())->firstWhere('name', 'normal')['url']}}"
           data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{clean($recette->title)}}">
            <figure class="image is-square">
                <picture>
                    <source type="image/webp"
                            srcset="{{collect($firstimg->first())->where('user' , $recette->id_user)->firstWhere('name', 'webp')['url']}}"
                            class="fit-cover" alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                    <img src="{{collect($firstimg->first())->where('user' , $recette->id_user)->firstWhere('name', 'normal')['url']}}"
                         class="fit-cover" alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
                </picture>
            </figure>
        </a>



        @if($firstimg->count() > 1)
            @foreach($firstimg as $image)
                <a href="{{collect($image)->firstWhere('name', 'normal')['url']}}"
                   data-lightbox="{{strip_tags(clean($recette->slug))}}"
                   data-title="{{strip_tags(clean($recette->title))}}">
                    <div class=" fit-cover"
                         style="width: 56px; background-size: cover; height: 38px; border-radius: 3px;
                                 background-image: url('{{collect($image)->firstWhere('name', 'thumb')['url']}}')">
                    </div>
                </a>

            @endforeach

            @if(collect($firstimg->first())->firstWhere('user', '!=', Auth::user()->id))
                <add-recipe recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                            user="{{Auth::user()->id}}"></add-recipe>
            @endif
        @endif


    @else
            {{--NO PICTURE --}}
    <picture-placeholder recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                         user="{{Auth::user()->id}}" ></picture-placeholder>

{{--            --}}{{--ADD YOUR OWN --}}{{--
            <add-recipe recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                        user="{{Auth::user()->id}}" text="Image de la recette : {{strip_tags(clean($recette->title))}}"></add-recipe>--}}
    @endif

</div>
