<section class="ingredients">

    <h2 class="title is-4">Ingredients</h2>

    <div id="ingr">
        <div class="columns" v-for="(row, index) in rows">


            <div class="column is-two-fifths">
                <input class="input" type="text" v-validate="'required'"  v-model="row.qtt"  placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]" >
            </div>
            <div class="column is-three-quarters">
                <input class="input" type="text" v-validate="'required'"  v-model="row.name" placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
            </div>



            <div class="column" v-if="index === (rows.length-1)">
                <a  @click="addRow()" class="button is-primary deleteicon"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <div class="column" v-else="index === (rows.length-1)">

            </div>
        </div>
    </div>




    <span v-cloak>
         <span v-show="errors.has('qtt_ingredient[]')" class="help is-danger">@lang('errors.qtt')</span>
         <span v-show="errors.has('ingredient[]')" class="help is-danger">@lang('errors.ingr')</span>
    </span>




</section>
