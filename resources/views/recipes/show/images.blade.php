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
{{--
        <a class="button_picture">

            <span class=" fa-stack " style="margin-right: 0.4rem;position: absolute;left: 2%;">
  <i class="fas fa-circle fa-stack-2x" style="color: #7f5fbf;"></i>
  <i class="fas fa-camera fa-stack-1x " style="color: #ebeaf5;"></i>
                  <i class="fas fa-plus " style="position:absolute;color:white"></i>
</span>

            Ajouter votre photo
        </a>--}}

    @else
        @foreach($images as $image)
            <a href="/recipes/{{$recette->id}}/{{$image->user_id}}/{{$image->image_name}}"
               data-lightbox="{{$recette->slug}}" data-title="{{$recette->title}}">
                <div class=" fit-cover" style="width: 56px; background-size: cover; height: 38px; border-radius: 3px;
                        background-image: url('/recipes/{{$recette->id}}/{{$image->user_id}}/{{$image->image_name}}')">
                </div>
            </a>

        @endforeach

    @endif


</div>
