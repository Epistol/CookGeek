<div class="field">
    <h2 class="title w-4/12">@lang('recipe.video')</h2>
    <div class="control">
        <input class="input" placeholder="{{__('recipe.video-array.placeholder')}}"
               value="@if(Route::is('*.edit')){{$recipe->video}}@endif
               @if(old('video')){{cleanInput(old('video'))}}@endif" name="video"
               id="video">
    </div>
</div>
