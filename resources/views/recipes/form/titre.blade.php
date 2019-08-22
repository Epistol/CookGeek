<div class="flex mb-4">
    <div class="flex-1 w-3/12" style="text-align: left;">
        <label class="title w-4/12">Titre</label>
    </div>
    <div class="flex-1">
        <input class="input_modal blck" type="text" placeholder="" name="title" id="title"
               value="@if(Route::is('*.edit')){{cleanInput($recipe->title)}}@else{{cleanInput(old('title'))}}@endif">
    </div>
</div>

