<p class="is-brand show-recipe-title">@lang('recipe.time-total')</p>
<div class="is-flex-center">
    <b>
        {{str_pad((int)$recipe->totalTimeHours, 2, '0', STR_PAD_LEFT)}}
        H {{str_pad((int)$recipe->totalTimeMinutes, 2, '0', STR_PAD_LEFT)}}
    </b>
</div>
