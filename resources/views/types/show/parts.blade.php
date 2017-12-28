<?php
if($recette->guest_type == ''){
    $recette->guest_type = "personnes";
}
?>
<p class="is-brand show-recipe-title"> {{ucfirst($recette->guest_type)}}</p>



<div class="is-flex-center">
<b>
        {{$recette->nb_guests}}
</b>
</div>
