<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 26/11/2017
 * Time: 01:58
 */

function sumerise_t($val)
{
    $format = '%1$02d';
    // si il y'a + d'1heure
    if ($val > 60) {
        $somme_h = $val / 60;
        $somme_m = $val - ((int)$somme_h * 60);
        // si le nb de minute est supérieur a 0, on les affiches
        if ($somme_m > 0) {
            return sprintf($format, $somme_h) . " h " . sprintf($format, $somme_m) . " min";
        } else {
            return sprintf($format, $somme_h) . " h ";
        }

    } else {
        $somme_h = 0;
        $somme_m = $val - ((int)$somme_h * 60);
        // si le nb de minute est supérieur a 0, on affiche qqch
        if ($somme_m > 0) {
            return sprintf($format, $somme_m) . " min";
        } else {
            return '';
        }

    }
}

$prep = sumerise_t($recipe->prep_time);
$cook = sumerise_t($recipe->cook_time);
$rest = sumerise_t($recipe->rest_time);

$somme_t = $recipe->prep_time + $recipe->cook_time + $recipe->rest_time;
?>
@if($somme_t == 0)

@else
    <div class="side-bg">
        <h4 class="title">Timing</h4>
        @if($recipe->prep_time && $recipe->prep_time > 0)
            <div class="flex mb-4">
                <div class="flex-1 w-1/12">
                    <p><i aria-hidden="true" class="fas fa-utensils"></i>
                    </p>
                </div>
                <div class="flex-1">
                    <p>{{ucfirst(trans('recipe.making-t')) }} : {{$prep}}</p>
                </div>
            </div>
        @endif
        @if($recipe->cook_time && $recipe->cook_time > 0)
            <div class="flex mb-4">
                <div class="flex-1 w-1/12">
                    <p><i aria-hidden="true" class="fas fa-thermometer-three-quarters"></i>
                    </p>
                </div>
                <div class="flex-1">
                    <p> {{ucfirst(trans('recipe.cooking-t')) }} : {{$cook}}</p>
                </div>
            </div>
        @endif
        @if($recipe->rest_time && $recipe->rest_time > 0)
            <div class="flex mb-4">
                <div class="flex-1 w-1/12">
                    <p><i aria-hidden="true" class="far fa-clock"></i>
                    </p>
                </div>
                <div class="flex-1">
                    <p> {{ucfirst(trans('recipe.resting-t')) }} : {{$rest}}</p>
                </div>
            </div>
        @endif
    </div>

@endif