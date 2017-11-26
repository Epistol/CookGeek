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

    <div class="full-circle {{$diff}}">
        {{$recette->difficulty}}
    </div>
