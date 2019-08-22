<tr>
    <td>{{$recipe->title}}</td>
    <td>
        <a href="{{route('recipe.show', $recipe->slug)}}">
            <figure class="image w-9/126x96	">
{{--                @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={{$recipe->title}}" class="fit-cover"
                         alt="{{$recipe->title}} / CDG">
                @else
                    <img src="/recipes/{{$recipe->id}}/{{$recipe->id_user}}/{{$img->image_name}}" class="fit-cover"
                         alt="{{$recipe->title}} / CDG">
                @endif--}}
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