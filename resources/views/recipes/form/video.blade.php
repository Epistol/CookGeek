<div class="field">
    <h2 class="title is-4">@lang('recipe.video')</h2>
    <div class="control">
        <input class="input" placeholder="{{__('recipe.video-array.placeholder')}}"
               value="@if(Route::is('*.edit')){{$recipe->video}}@endif
               {{cleanInput(old('video'))}}" name="video"
               id="video">
    </div>
</div>
