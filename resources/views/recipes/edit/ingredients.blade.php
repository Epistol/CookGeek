<section class="ingredients">
    <div id="ingr">

            <div class="column is-3" style="text-align: left;">
                <h2 class="title is-4">Ingredients</h2>
            </div>
        <draggable :options="{group:'people'}" @start="drag=true" @end="drag=false" >
            <ingredient_edit_form recipe_id="{{$recette->id}}"></ingredient_edit_form>
        </draggable>
    </div>
</section>
