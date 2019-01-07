<div class="column radiused">
    <div class="columns is-multiline">

        <div class="column is-3">
            @foreach($recettes as $recette)
                <div class="is-flex">

                    <figure class="image is-64x64 radiused">
						<?php $pic = DB::table('recipe_imgs')
							->where('recipe_id', '=', $recette->id)
							->first();
						?>
                        @if($pic)
                            <img src="/recipes/{{$pic->recipe_id}}/{{$pic->user_id}}/{{$pic->image_name}}"
                                 style="background-picture : 'https://picsum.photos/64/?random'" alt=""/>
                        @endif
                    </figure>
                    <a href="/recette/{{$recette->slug}}" class="titre_content">{!!$recette->title  !!}</a>
                </div>

            @endforeach

        </div>
    </div>
</div>


