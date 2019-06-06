

<tr>
    <td>
        <a href="{{route('recipe.show', $recipe->slug)}}">
            <figure class="image is-96x96	">
				<?php
				$img = DB::table('recipe_imgs')->where('user_id', '=', $recipe->id_user)->where('recipe_id', '=', $recipe->id)->first();
				?>
                @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={{$recipe->title}}" class="fit-cover"
                         alt="{{$recipe->title}} / CDG">
                @else
                    <img src="/recipes/{{$recipe->id}}/{{$recipe->id_user}}/{{$img->image_name}}" class="fit-cover"
                         alt="{{$recipe->title}} / CDG">
                @endif

            </figure>
        </a>
    </td>
    <td id="medaillon">  @include("recipes.medaillon")
    </td>
    <td id="title_recipe">
        <div class="is-centered">
            <p class="title-mini" id="recipe-user"><a
                        href="{{route('recipe.show', $recipe->slug)}}"> {{$recipe->title}}</a></p>
        </div>
    </td>
    <td>@include('recipes.elements.difficulty')</td>
    <td>@include('recipes.elements.price')</td>
    <td>@include('recipes.elements.total_time')</td>

</tr>