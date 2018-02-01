
<section class="bordered-cdg">
    <div class="columns">
        <div class="column">

            @empty($heartbeat)

            @endempty

            @isset($heartbeat->recipe_id)

                <?php
                $img = DB::table('recipe_imgs')->where('recipe_id', '=', $heartbeat->recipe_id)->first();
                ?>

                <img src="{{$img}}">
            @endif



            @isset($heartbeat->image_id)

            @endif


            {{--image principale--}}
        </div>
        <div class="column">
            <h1 class="title">Le coup de coeur</h1>
            <p>Blablabla</p>

            {{--Fiche info du coup de coeur--}}
        </div>
    </div>



</section>
