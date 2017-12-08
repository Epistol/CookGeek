<section class="ingredients">

    <h2 class="title is-4">Ingredients</h2>


    <div v-for="(row, index) in rows">
        <div class="columns">

            <div class="column is-two-fifths">
                <input class="input" type="text" v-model="row.qtt" placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]" >
            </div>
            <div class="column is-three-quarters">
                <input class="input" type="text" v-model="row.name" placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
            </div>
            <div class="column">
                <a @click="removeElement(index)" class="button deleteicon"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <div >
        <button type="button" class="button is-medium is-primary addsteprecipe" @click="addRow"><i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>

</section>
