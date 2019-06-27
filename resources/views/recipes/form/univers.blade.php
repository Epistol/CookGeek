<div class="columns">
    <div class="column is-3" style="text-align: left;">
        <label class="title is-4 is-">@lang('recipe.univers')</label>
    </div>
    <div class="column is-8" id="universe_input">
        <searchautocomplete searchtype="univers" data_old="{{cleanInput(old('univers'))}}"></searchautocomplete>
        @if(Route::has('edit'))
            @if(isset($univers->name))
                <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe"
                       value="{{cleanInput($univers->name)}}">
            @else
                <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe" value="">
            @endif
        @endif
    </div>

</div>