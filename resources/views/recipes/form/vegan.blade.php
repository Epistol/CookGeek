<div class="field vegan is-horizontal">
    <div style="width: 100%;">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <input id="switchNormal"
                           @if(Route::has('edit')){{  $recette->vegetarien === 1 ? "checked":"" }}@endif type="checkbox"
                           name="vegan" class="switch  is-rounded is-success">
                    <label for="switchNormal"> <i class="fas fa-leaf" aria-hidden="true"></i> @lang('recipe.vegan')
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>