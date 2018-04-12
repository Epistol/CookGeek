<p class="is-brand show-recipe-title">@lang('recipe.time-total')</p>

<?php

$somme_t = $recette->prep_time + $recette->cook_time + $recette->rest_time;
$somme_h = $somme_t / 60;
$somme_m = $somme_t - ((int)$somme_h * 60);
?>

<div class="is-flex-center">
    <b>
        {{(int)$somme_h}} H {{$somme_m}}
    </b>
</div>
