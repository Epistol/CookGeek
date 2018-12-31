<div class="content rating">

    <?php $count = 0;?>
    @for($i = 0; $i < $starsget[0]; $i++)
        <span class="star">
                        <img src="/img/rating/muf_full.png"/>
                        </span>
        <?php $count++;?>
    @endfor

    @if($starsget[1] >= 5)
        <span class="star">
                <img src="/img/rating/muf_half.png"/>
                </span>
        <?php $count++;?>
    @endif

    @if(!isset($starsget[0]) or $starsget[0] == NULL OR $starsget[0] == 0 )

        <?php $count = 5;?>
    @endif

    @for($i = $count; $i > $starsget[0]; $i--)
        <span class="star">
                <img class="greyed" src="/img/rating/muf_full.png"/>
                </span>
    @endfor


</div>