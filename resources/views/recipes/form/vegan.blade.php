<div class="field vegan is-horizontal">
    <div style="width: 100%;">
        <div class="flex mb-4">
            <div class="flex-1">
                <div class="field">
                    <input id="switchNormal"
                           @if(Route::is('*.edit')){{  $recipe->vegetarien === 1 ? "checked":"" }}@endif type="checkbox"
                           name="vegan" class="switch rounded-full is-success">
                    <label for="switchNormal"> <i class="fas fa-leaf" aria-hidden="true"></i> @lang('recipe.vegan')
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>