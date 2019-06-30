<div class="columns">
    <div class="column is-3" style="text-align: left;">
        <label class="title is-4 is-">@lang('recipe.univers')</label>
    </div>
    <div class="column is-8" id="universe_input">
        @if(Route::current()->getName() == 'recipe.edit')
            @foreach($recipe->universes as $universe)
            @if(isset($universe->name))
                <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe"
                       value="{{cleanInput($universe->name)}}">
            @else
                <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe" value="">
            @endif
            @endforeach
        @else
            <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe" value="">
        @endif
    </div>

</div>