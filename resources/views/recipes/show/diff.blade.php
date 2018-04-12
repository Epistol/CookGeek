<?php

if ($recette->difficulty == 1) {
    $diff = 'easy';
} elseif ($recette->difficulty == 1) {
    $diff = 'mid';
} else {
    $diff = 'hard';
}

?>


<p>  @lang('recipe.diff') :</p>


<div class="full-circle {{$diff}}">
    {{$recette->difficulty}}
</div>
