<section class="section-nomargin-side" id="liste-ingredients">
    <h3 class="title is_big">@lang("recipe.ingredients")</h3>
    <div class="flex mb-4 is-mobile is-multiline" id="ingredients">
        @forelse($recipe->ingredients as $index => $ingredient)
            <div class="flex-1 w-2/12 field break-more" id="checkbutton">
                <input class="is-checkradio is-ingredient-member" id="ingredientCheckbox[{{$index}}]" type="checkbox"
                       name="ingredientCheckbox[{{$index}}]">
                <label for="ingredientCheckbox[{{$index}}]"></label>
            </div>
            <div class="flex-1 w-10/12 field break-more" id="checkbutton">
                <label for="ingredientCheckbox[{{$index}}]">{{$ingredient->pivot->quantity}} {{$ingredient->name}}</label>
            </div>
        @empty
        @endforelse
    </div>
</section>

{{--<div class="is-flex-center" style="margin-top: 2rem;"><div class="field"><p class="control">    <a class="button is-direct">Ajouter à mes courses</a></div></div>--}}


