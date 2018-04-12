<p class="is-brand show-recipe-title">
    @lang('recipe.rating')
</p>
<div class="content is-flex-center rating">

    <?php $count = 0;?>
    @for($i = 0; $i < $stars[0]; $i++)
        <span class="star">
                        <img src="/img/rating/muf_full.png"/>
                        </span>
        <?php $count++;?>
    @endfor

    @if($stars[1] >= 5)
        <span class="star">
                <img src="/img/rating/muf_half.png"/>
                </span>
        <?php $count++;?>
    @endif

    @if(!isset($stars[0]) or $stars[0] == NULL OR $stars[0] == 0 )

        <?php $count = 5;?>
    @endif

    @for($i = $count; $i > $stars[0]; $i--)
        <span class="star">
                <img class="greyed" src="/img/rating/muf_full.png"/>
                </span>
    @endfor


</div>
