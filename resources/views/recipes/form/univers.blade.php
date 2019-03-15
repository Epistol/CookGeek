<div class="columns">
    <div class="column is-3" style="text-align: left;">
        <label class="title is-4 is-">Univers</label>
    </div>
    <div class="column is-8" id="universe_input">
        <searchautocomplete searchtype="univers"
                            data_old="{!! clean(strip_tags(old('univers'))) !!}  "></searchautocomplete>
        @if(Route::has('edit'))
            @if(isset($univers->name))
                <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe"
                       value="{{strip_tags(clean($univers->name))}}">
            @else
                <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe" value="">
            @endif
        @endif
    </div>

</div>