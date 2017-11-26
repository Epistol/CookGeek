<p class="is-brand show-recipe-title">
    @lang('recipe.rating')
</p>
<div class="content is-flex-center ">

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
        </div>
