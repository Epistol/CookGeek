<div class="columns">
            <div class="column is-centered is-flex-center">
                @if(Route::is('*.create'))
                    <button class="button  is-primary is-large publish" id="submit-all">Ajouter ma recette</button>

                @else
                <button class="button  is-primary is-large publish" id="submit-all">Editer ma recette</button>
            @endif
            </div>
</div>

