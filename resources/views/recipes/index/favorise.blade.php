<section class="bordered-cdg">
    <div class="flex mb-4">
        {{--Colonne image--}}
        <div class="flex-1">


            @isset($heartbeat->recipe_id)
                <?php
                $img = DB::table('recipe_imgs')->where('recipe_id', '=', $heartbeat->recipe_id)->first();
                //                dd($img);
                ?>
                <img src="{{$img}}">
            @endif

            @isset($heartbeat->image_id)
            @endif

            {{--image principale--}}
        </div>
        <div class="flex-1">
            {{--<h1 class="title">Le coup de coeur</h1>--}}
            @isset($heartbeat->texte)
                <p>{{$heartbeat->texte}}</p>
            @endif
            {{--Fiche info du coup de coeur--}}
        </div>
    </div>


</section>
