<?php

$somme_t = $recette->prep_time + $recette->cook_time + $recette->rest_time;
$somme = $controller->sumerise_t($somme_t);

?>
@if($somme == 0)

@else

    <p>
        {{$somme}}
    </p>

@endif