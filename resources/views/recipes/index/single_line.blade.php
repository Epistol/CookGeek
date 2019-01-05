

<tr>
    <td>
        <a href="{{route('recipe.show', $recette->slug)}}">
            <figure class="image is-96x96	">
				<?php
				$img = DB::table('recipe_imgs')->where('user_id', '=', $recette->id_user)->where('recipe_id', '=', $recette->id)->first();
				?>
                @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={{$recette->title}}" class="fit-cover"
                         alt="{{$recette->title}} / CDG">
                @else
                    <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{{$img->image_name}}" class="fit-cover"
                         alt="{{$recette->title}} / CDG">
                @endif

            </figure>
        </a>
    </td>
    <td id="medaillon">  @include("recipes.medaillon")
    </td>
    <td>
        <div class="is-centered">
            <p class="mini_title" id="recipe_user"><a
                        href="{{route('recipe.show', $recette->slug)}}"> {{$recette->title}}</a></p>
        </div>
    </td>
    <td>9</td>
    <td>7</td>
    <td>22</td>

</tr>