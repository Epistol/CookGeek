<div class="columns">
    <div class="column is-3" style="text-align: left;">
        <label class="title is-4">Titre</label>
    </div>
    <div class="column">
        <input class="input_modal blck" type="text" placeholder="" name="title" id="title"
               value="@if(Route::is('*.edit')){{$recipe->title}}@else{{clean(strip_tags(old('title')))}}@endif">
    </div>
</div>

