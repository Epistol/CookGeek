<?php
if ($recipe->guest_type == '') {
    $recipe->guest_type = "personnes";
}
?><p class="is-brand show-recipe-title">Portions</p>
<span>{{$recipe->nb_guests || 1}} {{ucfirst(strip_tags($recipe->guest_type))}}</span>


