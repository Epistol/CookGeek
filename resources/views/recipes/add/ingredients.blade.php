<section class="ingredients">


    <div id="ingr">
        <draggable :options="{group:'people'}" @start="drag=true" @end="drag=false">

            <div class=" columns draggable" v-for="(row, index) in rows">


                {{--     // Title--}}
                <div class="column is-3" style="text-align: left;" v-if="index === 0">
                    <h2 class="title is-4">Ingredients</h2>
                </div>
                <div class="column is-3" style="text-align: left;" v-else="index !=  0">
                </div>

                {{--   Qtt + lib--}}
                <div class="column">
                    <div class="columns ">
                        <div class="column is-3 ">
                            <input class="input_modal blck" type="text" v-validate="'required'" v-model="row.qtt"
                                   placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]">
                        </div>
                        <div class="column is-7">
                            <input class="input_modal blck" type="text" v-validate="'required'" v-model="row.name"
                                   placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                        </div>


                        <div class="column is-3 is-flex-center " v-cloak v-if="index === (rows.length-1)">
                            <a @click="addRow()" class="button is-primary  is-small deleteicon"><i class="fa fa-plus"
                                                                                                   aria-hidden="true"></i></a>
                        </div>
                        <div class="column is-3  is-flex-center close-hover" v-cloak v-else="index === (rows.length-1)">
                            <a @click="removeRow(index)" class="button is-small deleteicon"><i class="fa fa-minus"
                                                                                               aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </draggable>


        <span v-cloak>
         <span v-show="errors.has('ingredient[]')" class="help is-danger">@lang('errors.ingr')</span>
    </span>


    </div>

</section>
