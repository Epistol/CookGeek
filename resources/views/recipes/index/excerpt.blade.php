<div class="card cdg">
    <div class="card-image"><a href="{{route('recipe.show', $recipes[$i]->slug)}}">
            <figure class="image is-4by3">
				<?php

				$img = DB::table('recipe_imgs')->where('user_id', '=', $recipes[$i]->id_user)->where('recipe_id', '=', $recipes[$i]->id)->first();
				?>
                @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={{$recipes[$i]->title}}" class="fit-cover"
                         alt="{{$recipes[$i]->title}} / CDG">
                @else
                    <img src="/recipes/{{$recipes[$i]->id}}/{{$recipes[$i]->id_user}}/{{$img->image_name}}" class="fit-cover"
                         alt="{{$recipes[$i]->title}} / CDG">
                @endif

            </figure>
        </a>
    </div>
 {{--   <categ_icon text_icon="{{$categ->name}}"></categ_icon>


    @include("recipes.medaillon")--}}

    <div class="card-content recipe-index">
        <div class="media">
            <div class="media-content is-centered">
                <p class="title is-4"><a
                            href="{{route('recipe.show', $recipes[$i]->slug)}}"> {{$recipes[$i]->title}}</a></p>

            </div>
        </div>

        <div class="content">
            {{--    {{$recipes[$i]->commentary_author}}--}}

        </div>
    </div>
</div>