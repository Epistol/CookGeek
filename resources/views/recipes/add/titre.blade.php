<div class="columns">
    <div class="column is-3" id="titre_text" style="text-align: left;">
        <label class="title is-4">Titre</label>
    </div>
    <div class="column is-8" id="titre_input">

        <input class="input_modal blck" type="text" placeholder="{!! clean(strip_tags(old('title')))!!}" v-model="titre" name="title"
               id="title" value="{!! clean(strip_tags(old('title')))!!}"
               required>


    </div>

</div>