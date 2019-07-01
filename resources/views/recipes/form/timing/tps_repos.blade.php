<div class="field sleep  is-clearfix">
    <label class="label"><i class="far fa-clock" aria-hidden="true"></i><span
                class="timing">@lang('recipe.timing.time-rest')</span></label>
    <div class="field-body">
        <div class="field has-addons">
            <div class="control">
                <input class="input" id="" name="rest_heure" type="number" placeholder="0"
                       value="@if(Route::is('*.edit')){{$recipe->restTimeHours}}@endif" min="0"
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
                <input class="input" id="rest_minute" name="rest_minute" type="number" placeholder="0"
                       value="@if(Route::is('*.edit')){{$recipe->restTimeMinutes}}@endif" min="0"
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
