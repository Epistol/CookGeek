<p class="is-brand show-recipe-title">Difficulté</p>

<?php

        if($recette->difficulty == 1){
            $diff = 'easy';
        }
        elseif($recette->difficulty == 1){
            $diff = 'mid';
        }
        else {
            $diff = 'hard';
        }

?>

<div class="is-flex-center">

    <div class="full-circle {{$diff}}">
        {{$recette->difficulty}}
    </div>


</div>