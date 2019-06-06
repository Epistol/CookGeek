<?php

$somme_t = $recipe->prep_time + $recipe->cook_time + $recipe->rest_time;
$somme = $controller->sumerise_t($somme_t);

?>
@if($somme == 0)

@else

    <p>
        {{$somme}}
    </p>

@endif