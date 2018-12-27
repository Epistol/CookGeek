<!-- Image part -->
<div class=" has-text-centered" style="border-right: 1px solid #e5e1fb;border-bottom: 1px solid #e5e1fb;">
    @if($firstimg !== null )
        @php($url = url("/recipes/".$recette->id."/".$recette->id_user."/".$firstimg->image_name) )
        <a href="{{$url}}"
           data-lightbox="{{$recette->slug}}" data-title="{{$recette->title}}">
            <figure class="image is-square">
				<?php $image = asset('/recipes/' . $recette->id . '/' . $recette->id_user . '/' . $firstimg->image_name)
				?>
                <img src="<?=  $image?>" class="fit-cover">
            </figure>
        </a>
    @endif


    @if($images->isEmpty())

        <p>Ajouter votre réalisation</p>

    @else
        @foreach($images as $image)

            <div class=" fit-cover" style="width: 56px; background-size: cover; height: 38px; border-radius: 3px;
                    background-image: url('/recipes/{{$recette->id}}/{{$image->user_id}}/{{$image->image_name}}')">

            </div>

        @endforeach

    @endif


</div>
