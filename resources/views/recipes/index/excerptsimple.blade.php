<div class="card cdg">
    <div class="card-image"><a href="{{route('recipe.show', $recette->slug)}}">
        <figure class="image is-4by3">
            <?php

                $img = DB::table('recipe_imgs')->where('user_id','=',$recette->id_user)->where('recipe_id', '=', $recette->id)->first();
            ?>
            @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={{$recette->title}}" alt="{{$recette->title}} / CDG">
                @else
                    <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{{$img->image_name}}" alt="{{$recette->title}} / CDG">
                @endif

        </figure></a>
    </div>
    <a href="{{route('media.show', $c->name)}}">
    <div class="medaillon ">
        @if($c->name== 'tv')
            <div class="medail {{strtolower($c->name)}}" ></div>
        @else
            <div class="medail {{strtolower($c->name)}}"></div>
        @endif
    </div>
    </a>
    <div class="card-content indexrecipe">
        <div class="media">
            <div class="media-content is-centered">
                <p class="title is-4"><a href="{{route('recipe.show', $recette->slug)}}"> {{$recette->title}}</a></p>

            </div>
        </div>

        <div class="content">
        {{--    {{$recette->commentary_author}}--}}

        </div>
    </div>
</div>