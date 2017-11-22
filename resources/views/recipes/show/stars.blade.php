<?php $count = 0;?>
@for($i = 0; $i < $stars[0]; $i++)

    <i class="material-icons">star</i>
    <?php $count++;?>
@endfor

@if($stars[1] >= 5)

    <i class="material-icons">star_half</i>
    <?php $count++;?>
@endif


@for($i = $count; $i > $stars[0]; $i--)

        <i class="material-icons">star_border</i>

@endfor



