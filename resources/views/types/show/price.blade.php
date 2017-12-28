<div class="is-flex">

        @lang('recipe.budget') :

        <div class="dollarsum">

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



        </div>
</div>
