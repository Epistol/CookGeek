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
	if($val > 60) {
		$somme_h = $val / 60;
		$somme_m = $val - ((int)$somme_h * 60);
		// si le nb de minute est supérieur a 0, on les affiches
		if($somme_m > 0) {
			return sprintf($format, $somme_h) . " h " . sprintf($format, $somme_m) . " min";
		} else {
			return sprintf($format, $somme_h) . " h ";
		}

	} else {
		$somme_h = 0;
		$somme_m = $val - ((int)$somme_h * 60);
		// si le nb de minute est supérieur a 0, on affiche qqch
		if($somme_m > 0) {
			return sprintf($format, $somme_m) . " min";
		} else {
			return '';
		}

	}
}


$prep = sumerise_t($recette->prep_time);
$cook = sumerise_t($recette->cook_time);
$rest = sumerise_t($recette->rest_time);


$somme_t = $recette->prep_time + $recette->cook_time + $recette->rest_time;
?>
@if($somme_t == 0)

@else
    <div class="columns">


        <div class="column ">
            @if($recette->prep_time !== 0)
                <p><i aria-hidden="true" class="fas fa-utensils"></i>
                    {{$prep}} @lang("recipe.of") @lang('recipe.making-t')</p>
            @endif
            @if($recette->cook_time !== 0)

                <p><i aria-hidden="true" class="fas fa-thermometer-three-quarters"></i>
                    {{$cook}} @lang("recipe.of") @lang('recipe.cooking-t')
                </p>
            @endif  @if($recette->rest_time !== 0)
                <p><i aria-hidden="true" class="far fa-clock"></i>
                    {{$rest}} @lang("recipe.of") @lang('recipe.resting-t')
                </p>  @endif
        </div>

    </div>
@endif