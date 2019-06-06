<div class="">

    <?php $count = 0;
    if ($recipe->cost == null) {
        $recipe->cost = 0;
    }?>
    @for($i = 0; $i < $recipe->cost; $i++)

        <i class="fas fa-dollar-sign"></i>
        <?php $count++;?>
    @endfor

    @for($i = 3 ; $i > $count; $i--)
        <span style="opacity:0.5">
                    <i class="fas fa-dollar-sign"></i>
                </span>
    @endfor
</div>
