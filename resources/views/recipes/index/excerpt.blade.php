<div class="card">
    <div class="card-image">
        <figure class="image is-4by3">
            <?php
                $img = DB::table('recipe_imgs')->where('user_id','=',$r->id_user)->where('recipe_id', '=', $r->id)->first();

            ?>
            @if($img == null or empty($img))
                    <img src="http://via.placeholder.com/300x200?text={{$r->title}}" alt="{{$r->title}} / CDG">
                @else
                    <img src="/recipes/{{$r->id}}/{{$r->id_user}}/{{$img->image_name}}" alt="{{$r->title}} / CDG">
                @endif

        </figure>
    </div>
    <div class="card-content">
        <div class="media">
            <div class="media-content">
                <p class="title is-4"><a href="{{route('recipe.show', $r->slug)}}"> {{$r->title}}</a></p>
            </div>
        </div>

        <div class="content">
            {{$r->commentary_author}}

        </div>
    </div>
</div>