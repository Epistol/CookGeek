<div class="field">
    <h2 class="title w-4/12">Commentaire</h2>
    <div class="control">
        <textarea class="textarea"
                  placeholder="Des suggestions, des améliorations, le site d'origine de la recette ... "
                  name="comment" id="comment">
            @if(isset($recipe)){{cleanInput($recipe->commentary_author)}}@endif
            {{cleanInput(old('comment'))}}
        </textarea>
    </div>
</div>
