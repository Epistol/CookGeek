<?php
if ($recette->guest_type == '') {
    $recette->guest_type = "personnes";
}
?><p class="is-brand show-recipe-title">Portions</p>
<span>{{$recette->nb_guests || 1}} {{ucfirst(strip_tags(clean($recette->guest_type)))}}</span>


