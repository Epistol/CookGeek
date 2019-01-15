<!-- Image part -->
<div class=" has-text-centered" >
    @if($firstimg !== null )
        <a href="{{$firstimg->first()}}"
           data-lightbox="{{strip_tags(clean($recette->slug))}}" data-title="{{clean($recette->title)}}">
            <figure class="image is-square">
                <img src="{{ $firstimg->first() }}" class="fit-cover" alt="Image de la recette : {{strip_tags(clean($recette->title))}}">
            </figure>
        </a>
    @endif

    @if(count($firstimg) > 1))
    {{--
            <a class="button_picture">

                <span class=" fa-stack " style="margin-right: 0.4rem;position: absolute;left: 2%;">
      <i class="fas fa-circle fa-stack-2x" style="color: #7f5fbf;"></i>
      <i class="fas fa-camera fa-stack-1x " style="color: #ebeaf5;"></i>
                      <i class="fas fa-plus " style="position:absolute;color:white"></i>
    </span>

                Ajouter votre photo
            </a>--}}


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
