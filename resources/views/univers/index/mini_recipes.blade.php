<div class="column radiused">
    <div class="columns ">
        <div class="column is-one-third">
            {{--Récupérer l'image de la catégorie--}}
            <img alt="title" src="https://picsum.photos/250/?random"/>
        </div>
        <div class="column">
            <p class="titre_partie">{{$univers_datum->name}}</p>
            {{--<p>Hello : il y'a sans doute 1 ou 2 recette dans l'univers :</p>--}}
            {{--Récupérer les 2-3 dernieres recettes--}}
            @foreach($recettes as $recette)
				<?php //dd($recette->id);?>
                <mini_recipe_list_element :recipe="{{json_encode($recette)}}"></mini_recipe_list_element>
            @endforeach

        </div>
    </div>
</div>


