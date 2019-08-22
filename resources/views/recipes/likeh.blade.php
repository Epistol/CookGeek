<div class="is-pulled-right is-flex">
    <LikeRecipe :recipeid="'{{$recipe->id}}'" :userid="'{{ Auth::id() }}'"></LikeRecipe>
    <a class="button tooltip is-tooltip-left print h-8 w-8 flex items-center justify-center" data-tooltip="@lang('common.print')"
       href="javascript:window.print()">
                  <span class="icon fill-current  mt-1">
                   <i class="material-icons">&#xE8AD;</i>
                       <span hidden>@lang('common.print')</span>
                  </span>
    </a>
    @include("recipes.show.media")
</div>


