<div class="is-pulled-right is-flex">
    <LikeRecipe :recipeid="'{{$recipe->id}}'" :userid="'{{ Auth::id() }}'"></LikeRecipe>
    <a class="button tooltip is-tooltip-left print" data-tooltip="@lang('common.print')"
       href="javascript:window.print()">
                  <span class="icon is-small">
                   <i class="material-icons">&#xE8AD;</i>
                       <span hidden>@lang('common.print')</span>
                  </span>
    </a>
    @include("recipes.show.media")
</div>


