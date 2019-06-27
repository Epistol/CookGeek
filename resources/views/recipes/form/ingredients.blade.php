<section class="ingredients">
    <div id="ingr">

        {{--If add--}}
        @if(Route::is('*.create'))
            <div class="column is-3" style="text-align: left;">
                <h2 class="title is-4">@lang('recipe.ingredients')</h2>
            </div>
            <ingredient_form></ingredient_form>
        @else
            {{--If edit--}}
            <h2 class="title is-4">@lang('recipe.ingredients')</h2>
            <ingredient-edit-form recipe_id="{{intval($recipe->id)}}"></ingredient-edit-form>
        @endif

    </div>
</section>
