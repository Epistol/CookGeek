<div class="card cdg">
    <div class="card-image"><a href="{{route('recipe.show', $recette->slug)}}">
            <figure class="image is-4by3">
				<?php $img = DB::table('recipe_imgs')->where('user_id', '=', $recette->id_user)->where('recipe_id', '=', $recette->id)->first(); ?>
                @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={!! strip_tags(clean($recette->title)) !!}" class="fit-cover"
                         alt="{!! strip_tags($recette->title) !!} / CDG">
                @else
                    <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{!! strip_tags(clean($img->image_name)) !!}" class="fit-cover"
                         alt="{!! strip_tags($recette->title) !!} / CDG">
                @endif

            </figure>
        </a>
    </div>
    @include("recipes.medaillon")
    <div class="card-content indexrecipe">
        <div class="media">
            <div class="media-content is-centered">
                <p class="title is-4"><a href="{{route('recipe.show', $recette->slug)}}"> {!! strip_tags(clean($recette->title)) !!}</a></p>

            </div>
        </div>

        <div class="content">
        </div>
    </div>
</div>