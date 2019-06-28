<div class="field">
    <div class="control type-selector cc-selector">
        <div class="field-label" style="text-align: left;padding-bottom: 2rem;">
            <label class="title is-4">@lang('common.media')</label>
        </div>

        <div class="columns is-multiline">
            @foreach ($types as $key=>$type)
                @php(++$key)
                <div class="column has-text-centered">
                    <label class="radio">
                        @if($type->name== 'tv')
                            <input type="radio" id="{{$type->name}}"
                                   @if(Route::has('edit')){{ $key === $recipe->type_univers ? "checked":"" }}@endif
                                   name="type" value="{{$type->id}}">
                            <label class="drinkcard-cc {{$type->name}}" for="{{$type->name}}"></label>
                            <p>
                                Cinéma / Tv
                            </p>
                        @else
                            <input type="radio" id="{{$type->name}}"
                                   @if(Route::has('edit')){{ $key === $recipe->type_univers ? "checked":"" }}@endif
                                   name="type" value="{{$type->id}}">
                            <label class="drinkcard-cc {{$type->name}}" for="{{$type->name}}"></label>
                            <p>
                                @if($type->hasTranslation(app()->getLocale()))
                                    {{ucfirst($type->translateOrDefault(app()->getLocale())->name)}}
                                @else
                                    {{ucfirst($type->name)}}
                                @endif
                            </p>
                        @endif
                    </label>

                </div>

            @endforeach
        </div>
    </div>
</div>