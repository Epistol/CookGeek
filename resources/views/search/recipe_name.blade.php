{{--Recettes ayant dans le nom la recherche --}}

@if(array_key_exists('recipe', $resultats))

    @foreach($resultats['recipe']->chunk(2)  as  $recettechunk)


        <div class="columns" style="margin-top: 2rem; margin-bottom: 2rem;">

        @foreach ($recettechunk as $recette)
            <?php
            $firstimg = DB::table('recipe_imgs')
                ->where('recipe_id', '=', $recette->id)
                ->where('user_id', '=', $recette->id_user)
                ->first();
            ?>

                <div class="column is-6 is-result">
                    <div class="columns">
                        <div class="column is-4 is-paddingless is-marginless">
                            <figure class="image is-1by1" >
                                <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{{$firstimg->image_name}}">
                            </figure>
                        </div>
                        <div class="column ">
                            {{$recette->title}}
                        </div>
                    </div>
                </div>


        @endforeach

            {{ $resultats['recipe']->links() }}
        </div>


    @endforeach


@endif