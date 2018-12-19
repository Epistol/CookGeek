<div class="field parts is-clearfix">
    <label class="label"><i class="fa fa-child" aria-hidden="true"></i><span class="parts">Pour</span></label>
    <div class="field-body">
        <div class="field has-addons">
            <div class="control">
                <input class="input" id="unite_part" name="unite_part" type="number" placeholder="ex : 4" value="{{$recette->nb_guests}}">
            </div>
            <div class="control">
                <input class="input" id="value_part" name="value_part" type="text" placeholder="personnes, parts, etc"
                       value="{{$recette->guest_type ?: ""}}">
            </div>
        </div>

    </div>

</div>
