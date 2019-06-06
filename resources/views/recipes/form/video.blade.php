<div class="field">
    <h2 class="title is-4">Vidéo</h2>
    <div class="control">
        <input class="input" placeholder="Vous avez fait une vidéo ? Mettez l'url ;)  "
               value="@if(Route::has('edit')){{$recipe->video}}@endif" name="video"
               id="video">
    </div>
</div>
