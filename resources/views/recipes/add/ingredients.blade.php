<section class="ingredients">



    <div id="ingr">
        <div class=" columns " v-for="(row, index) in rows">

            <div class="column is-3" style="text-align: left;" v-if="index === 0">
                <h2 class="title is-4">Ingredients</h2>
            </div>
            <div class="column is-3" style="text-align: left;" v-else="index !=  0">
            </div>

            <div class="columns ">
                <div class="column is-3 ">
                    <input class="input_modal blck" type="text" v-validate="'required'"  v-model="row.qtt"  placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]" >
                </div>
                <div class="column is-7">
                    <input class="input_modal blck" type="text" v-validate="'required'"  v-model="row.name" placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                </div>



                <div class="column is-3 is-flex-center" v-cloak  v-if="index === (rows.length-1)">
                    <a  @click="addRow()" class="button is-primary  is-small deleteicon"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <div class="column is-3  is-flex-center" v-cloak v-else-if="index === (rows.length-2)">
                    <a  @click="removeRow(index)" class="button is-small deleteicon"><i class="fa fa-minus" aria-hidden="true"></i></a>
                </div>

                <div class="column" v-cloak v-else="index === (rows.length-1)">
                    <span></span>
                </div>
            </div>
        </div>




        <span v-cloak>
         <span v-show="errors.has('qtt_ingredient[]')" class="help is-danger">@lang('errors.qtt')</span>
         <span v-show="errors.has('ingredient[]')" class="help is-danger">@lang('errors.ingr')</span>
    </span>




</section>
