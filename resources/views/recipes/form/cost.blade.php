<div class="field is-clearfix">
    <div class="control">
        <div class="lecout">
            <p>@lang('recipe.cost-making')</p>
            <fieldset class="rating">
                @for($i = 3; $i >= 1;$i--)
                    @if(old('cost') == $i)
                        @if(Route::is('*.create'))
                            <input type="radio" selected="cost" id="{{$i}}"
                                   value="{{$i}}" name="cost"/>
                        @else
                            <input type="radio" selected="cost" id="{{$i}}"
                                   {{ $i === $recipe->cost ? "checked":"" }}
                                   value="{{$i}}" name="cost"/>
                        @endif
                    @else
                        <input type="radio" id="{{$i}}" value="{{$i}}" name="cost"/>
                    @endif
                    <label class="cost button" for="{{$i}}">
                        <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                    </label>
                @endfor
            </fieldset>
        </div>
    </div>
</div>