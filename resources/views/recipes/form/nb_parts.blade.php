<div class="field parts is-clearfix">
    <label class="label"><i class="fa fa-child" aria-hidden="true"></i><span class="parts">Pour</span></label>
    <div class="field-body">
        <div class="field has-addons">
            <div class="control">
                <input class="input" id="unite_part" name="unite_part" type="number" placeholder="ex : 4"
                       value="@if(Route::is('*.edit')){{$recette->nb_guests}}@else{{ clean(strip_tags(old('unite_part')))}}@endif">
            </div>
            <div class="control">
                <input class="input" id="value_part" name="value_part" type="text"
                       placeholder="personnes, parts, etc"
                       value="@if(Route::is('*.create')){{clean(strip_tags(old('value_part')))}}@else{{$recette->guest_type ?: ""}}@endif">
            </div>
        </div>

    </div>

</div>
