
<section class="ingredients">

    <h2 class="title is-4">Etapes</h2>


            <div v-for="(step, index) in steps">
                <div class="columns">

                    <div class="column is-3">
                       <span> Etape @{{index+1}}</span>
                    </div>
                    <div class="column">
                        <div class="columns">
                            <div class="column is-10">
                                <textarea class="input_modal blck" type="text" v-validate="'required'" placeholder="Que fais-t-on aujourd'hui ? "  v-model="step.etape"  rows="2" name="step[]" id="step[]"></textarea>
                            </div>


                            <div class="column is-3 is-flex-center" v-cloak  v-if="index === (steps.length-1)">
                                <a  @click="addStep()" class="button is-primary  is-small deleteicon"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                            <div class="column is-3  is-flex-center" v-cloak v-else-if="index === (steps.length-2)">
                                <a  @click="removeStep(index)" class="button is-small deleteicon"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            </div>

                            <div class="column" v-cloak v-else="index === (rows.length-1)">

                            </div>
                        </div>
                    </div>




                </div>




            </div>
            <span v-cloak>
         <span v-show="errors.has('step[]')" class="help is-danger">@lang('errors.step')</span>
    </span>


</section>



