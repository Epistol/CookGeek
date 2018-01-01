<section class="section-nomargin-side">

    <h3 class="title is-5">@lang("recipe.ingredients")</h3>

    @forelse($ingredients as $index=>$ingr)
        <div class="ingr">
            <div class="columns">
                <div class="column is-1">
                    <div class="field">
                        <input class="is-checkradio" id="exampleCheckbox[{{$index}}]" type="checkbox" name="exampleCheckbox[{{$index}}]" >
                        <label for="exampleCheckbox[{{$index}}]"></label>
                    </div>
                </div>
                <div class="column is-offset-1">
                    <?php
                    $nom_in = DB::table('ingredients')->where('id', $ingr->id_ingredient)->value('name');
                    ?>
                    <label for="exampleCheckbox[{{$index}}]">  {{$ingr->qtt}} {{$nom_in}}</label>
                </div>

            </div>
        </div>
    @empty
    @endforelse


    {{--<div class="is-flex-center" style="margin-top: 2rem;"><div class="field"><p class="control">    <a class="button is-direct">Ajouter à mes courses</a></div></div>--}}



</section>
