<div class="field cook  is-clearfix">
    <label class="label"><i class="fas fa-thermometer-three-quarters" aria-hidden="true"></i>
        <span  class="timing">@lang('recipe.timing.time-cook')</span></label>
    <div class="field-body">
        <div class="field has-addons">
            <div class="control">
                <input class="input" id="cook_heure" name="cook_heure" type="number" placeholder="0"
                       value="@if(Route::is('*.edit')){{$recipe->cookTimeHours}}@endif"
                       min="0"
                       pattern="[0-9]">
            </div>
            <div class="control">
                <a class="button is-static">
                    {{lcfirst(__('recipe.timing.hour'))}}
                </a>
            </div>
        </div>
        <div class="field has-addons">
            <div class="control">
                <input class="input" id="cook_minute" name="cook_minute" type="number" placeholder="0"
                       value="@if(Route::is('*.edit')){{$recipe->cookTimeMinutes}}@endif" min="0"
                       pattern="[0-9]">
            </div>
            <div class="control">
                <a class="button is-static">
                    {{lcfirst(__('recipe.timing.minute'))}}
                </a>
            </div>
        </div>
    </div>
</div>
