<h2 class="title is-4">Ingredients</h2>


<table class="table bgborder  is-fullwidth">

    <tbody>
    <tr v-for="(row, index) in rows" >
        <td>  @{{index+1}}  </td>
        <td>  <input class="input" type="text" v-model="row.qtt " placeholder="Quantité"></td>
        <td>
            <input class="input" type="text" v-model="row.name" placeholder="ingrédient">
        </td>

        <td><a @click="removeElement(index)" class="deleteicon"><i class="fa fa-times" aria-hidden="true"></i></a></td>
    </tr>
    </tbody>
</table>