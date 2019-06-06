<section class="section-nomargin-side" id="liste-ingredients">
    <h3 class="title is_big">@lang("recipe.ingredients")</h3>
    <div class="columns is-mobile is-multiline" id="ingredients">

        @forelse($recipe->ingredients()->get() as $index=>$ingr)
            <div class="column is-2 field" id="checkbutton">
                <input class="is-checkradio is-ingredient-member" id="ingredientCheckbox[{{$index}}]" type="checkbox"
                       name="ingredientCheckbox[{{$index}}]">
                <label for="ingredientCheckbox[{{$index}}]"></label>
            </div>
            <div class="column is-10 field" id="checkbutton">
                <?php
                $nom_in = DB::table('ingredients')->where('id', $ingr->id_ingredient)->value('name');
                ?>
                <label for="ingredientCheckbox[{{$index}}]">{{$ingr->qtt}} {{$nom_in}}</label>
            </div>
        @empty
        @endforelse
    </div>

</section>


{{--<div class="is-flex-center" style="margin-top: 2rem;"><div class="field"><p class="control">    <a class="button is-direct">Ajouter à mes courses</a></div></div>--}}


