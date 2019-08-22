<section class="ingredients">
    <div id="ingr">

        {{--If add--}}
        @if(Route::is('*.create'))
            <div class="flex-1 w-3/12" style="text-align: left;">
                <h2 class="title w-4/12">@lang('recipe.ingredients')</h2>
            </div>
            <ingredient_form></ingredient_form>
        @else
            {{--If edit--}}
            <h2 class="title w-4/12">@lang('recipe.ingredients')</h2>
            <ingredient_form ingredients="{{json_encode($recipe)}}"></ingredient_form>
        @endif

    </div>
</section>
