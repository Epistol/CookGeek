<h2 class="title is-4">Etapes</h2>

<table class="table bgborder  is-fullwidth">
    <tbody>
    <tr v-for="(step, index) in steps" >
        <td> Etape @{{index+1}}  </td>
        <td>  <textarea class="textarea" type="text" v-model="step.etape " placeholder="Kékifofaire ?" rows="2"></textarea></td>

        <td><a @click="removeStep(index)" class="button deleteicon"><i class="fa fa-times" aria-hidden="true"></i></a></td>
    </tr>
    </tbody>
</table>

<div >
    <button type="button" class="button is-medium is-primary addsteprecipe" @click="addStep"><i class="fa fa-plus" aria-hidden="true"></i></button>
</div>
