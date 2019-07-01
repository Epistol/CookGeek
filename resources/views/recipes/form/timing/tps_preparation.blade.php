<div class="field prep is-clearfix">
    <label class="label"><i class="fas fa-utensils" aria-hidden="true"></i><span
                class="timing">@lang('recipe.timing.time-prep')</span></label>
    <div class="field-body">
        <div class="field has-addons">
            <div class="control">
                <input class="input" id="prep_heure" name="prep_heure" type="number" placeholder="0"
                       value="@if(Route::is('*.edit')){{$recipe->prepTimeHours}}@endif"
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
                <input class="input" id="prep_minute" name="prep_minute" type="number" placeholder="0"
                       value="@if(Route::is('*.edit')){{$recipe->prepTimeMinutes}}@endif"
                       min="0"
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
