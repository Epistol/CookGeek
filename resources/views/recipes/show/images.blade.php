<!-- Image part -->
<div class=" has-text-centered">
    @if($firstimg !== null )
        <a href="{{$firstimg->first()}}"
           data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{clean($recette->title)}}">
            <figure class="image is-square">
                <img src="{{ $firstimg->first() }}" class="fit-cover"
                     alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
            </figure>
        </a>
    @endif

        <add-recipe recipeid="{{$recette->id}}" user="{{Auth::user()->id}}"></add-recipe>

    @if(count($firstimg) > 1))
    @foreach($firstimg as $image)
        <a href="/recipes/{{$recette->id}}/{{$image->user_id}}/{{$image->image_name}}"
           data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{strip_tags(clean($recette->title))}}">
            <div class=" fit-cover" style="width: 56px; background-size: cover; height: 38px; border-radius: 3px;
                    background-image: url('/recipes/{{$recette->id}}/{{$image->user_id}}/{{$image->image_name}}')">
            </div>
        </a>

    @endforeach

    @endif
</div>
