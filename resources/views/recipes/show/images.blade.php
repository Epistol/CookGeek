<!-- Image part -->
<div class=" has-text-centered" style="border-right: 1px solid #e5e1fb;border-bottom: 1px solid #e5e1fb;">
    @if($firstimg != null )
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

        {{--<p>Ajouter votre réalisation</p>--}}

    @else
        @foreach($images as $image)

            <figure class="image is-64x64 is-marginless">
                <img src="/recipes/{{$recette->id}}/{{$image->user_id}}/{{$image->image_name}}">
            </figure>
        @endforeach

    @endif


</div>
