
    <h3 class="title is_big">@lang("recipe.ingredients")</h3>

    @forelse($ingredients as $index=>$ingr)
        <div class="ingr">
            <div class="columns is-mobile" id="ingredients">
                <div class="column is-1" id="checkbutton">
                    <div class="field">
                        <input class="is-checkradio" id="ingredientCheckbox[{{$index}}]" type="checkbox"
                               name="ingredientCheckbox[{{$index}}]">
                        <label for="ingredientCheckbox[{{$index}}]"></label>
                    </div>
                </div>
                <div class="column is-offset-1" id="ingr_title">
					<?php
					$nom_in = DB::table('ingredients')->where('id', $ingr->id_ingredient)->value('name');
					?>
                    <label for="ingredientCheckbox[{{$index}}]">  {{$ingr->qtt}} {{$nom_in}}</label>
                </div>

            </div>
        </div>
    @empty
    @endforelse


    {{--<div class="is-flex-center" style="margin-top: 2rem;"><div class="field"><p class="control">    <a class="button is-direct">Ajouter à mes courses</a></div></div>--}}


