<section class="ingredients">
    <div id="ingr">
        <draggable :options="{group:'people'}" @start="drag=true" @end="drag=false" >


                <div class="column is-3" style="text-align: left;">
                    <h2 class="title is-4">Ingredients</h2>
                </div>
                    <ingredient_form ></ingredient_form>
        </draggable>
    </div>
        <span v-cloak>
         <span v-show="errors.has('ingredient[]')" class="help is-danger">@lang('errors.ingr')</span>
    </span>
</section>
