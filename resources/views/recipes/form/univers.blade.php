<div class="flex mb-4">
    <div class="flex-1 w-3/12" style="text-align: left;">
        <label class="title w-4/12 is-">@lang('recipe.univers')</label>
    </div>
    <div class="flex-1 w-8/12" id="universe_input">
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