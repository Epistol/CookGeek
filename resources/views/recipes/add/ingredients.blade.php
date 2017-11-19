<section class="ingredients">

    <h2 class="title is-4">Ingredients</h2>


    <table class="table bgborder  is-fullwidth">

        <tbody>
        <tr v-for="(row, index) in rows" >

            <td>  <input class="input" type="number" v-model="row.qtt" placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]" ></td>
            <td>
                <input class="input" type="text" v-model="row.name" placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
            </td>

            <td><a @click="removeElement(index)" class="button deleteicon"><i class="fa fa-times" aria-hidden="true"></i></a></td>
        </tr>
        </tbody>
    </table>

    <div >
        <button type="button" class="button is-medium is-primary addsteprecipe" @click="addRow"><i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>

</section>
