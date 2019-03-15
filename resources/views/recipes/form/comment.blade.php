<div class="field">
    <h2 class="title is-4">Commentaire</h2>
    <div class="control">
        <textarea class="textarea"
                  placeholder="Des suggestions, des améliorations, le site d'origine de la recette ... " value=""
                  name="comment" id="comment">@if(isset($recette)){{$recette->commentary_author}}@endif</textarea>
    </div>
</div>
