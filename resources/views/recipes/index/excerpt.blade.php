<div class="card">
    <div class="card-image">
        <figure class="image is-4by3">
            <?php

                $img = DB::table('recipe_imgs')->where('user_id','=',$recettes[$i]->id_user)->where('recipe_id', '=', $recettes[$i]->id)->first();
            ?>
            @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={{$recettes[$i]->title}}" alt="{{$recettes[$i]->title}} / CDG">
                @else
                    <img src="/recipes/{{$recettes[$i]->id}}/{{$recettes[$i]->id_user}}/{{$img->image_name}}" alt="{{$recettes[$i]->title}} / CDG">
                @endif

        </figure>
    </div>
    <div class="card-content">
        <div class="media">
            <div class="media-content">
                <p class="title is-4"><a href="{{route('recipe.show', $recettes[$i]->slug)}}"> {{$recettes[$i]->title}}</a></p>
                @if($c->name== 'tv')
                    <div class="icones {{strtolower($c->name)}}" ></div>
                @else
                    <div class="icones {{strtolower($c->name)}}"></div>
                @endif
            </div>
        </div>

        <div class="content">
            {{$recettes[$i]->commentary_author}}

        </div>
    </div>
</div>