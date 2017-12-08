{{--
<h2 class="title is-4">Etapes</h2>

<table class="table bgborder  is-fullwidth">
    <tbody>
    <tr v-for="(step, index) in steps" >
        <td> Etape @{{index+1}}  </td>
        <td>  <textarea class="textarea" type="text" v-model="step.etape" placeholder="Kékifofaire ?" rows="2" name="step[]" id="step[]"></textarea></td>

        <td><a @click="removeStep(index)" class="button deleteicon"><i class="fa fa-times" aria-hidden="true"></i></a></td>
    </tr>
    </tbody>
</table>
<button type="button" class="button is-medium is-primary addsteprecipe" @click="addStep"><i class="fa fa-plus" aria-hidden="true"></i></button>



--}}

<section class="ingredients">

    <h2 class="title is-4">Etapes</h2>


    <div v-for="(step, index) in steps">
        <div class="columns">

            <div class="column is-two-fifths">
                Etape @{{index+1}}
            </div>
            <div class="column is-three-quarters">
                <textarea class="input" type="text" v-validate="'required'"  v-model="step.etape"  rows="2" placeholder="ingrédient" name="step[]" id="step[]"></textarea>
            </div>
            <div class="column">
                <a :disabled="errors.any()" @click="addStep()" class="button is-primary deleteicon"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
        </div>




    </div>
    <span v-cloak>
         <span v-show="errors.has('step[]')" class="help is-danger">@lang('errors.qtt')</span>
    </span>


</section>




