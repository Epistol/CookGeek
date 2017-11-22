<p class="is-brand">Budget</p>

<?php $count = 0;

if($recette->cost == null){
    $recette->cost = 0;
}?>

@for($i = 0; $i < $recette->cost; $i++)

    <span class="dollar">$</span>
    <?php $count++;?>
@endfor

@for($i = 3 ; $i > $count; $i--)

    <span class="dollar_null">$</span>

@endfor


