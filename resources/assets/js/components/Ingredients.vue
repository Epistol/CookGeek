<template v-for="(row,index) in liste">
    <div class="columns">


        <div class="column is-two-fifths">
            <input class="input" type="text" v-validate="'required'"   placeholder="Quantité" name="qtt_ingredient"  id="qtt_ingredient"  v-model="row.qtt">
        </div>
        <div class="column is-three-quarters">
            <input class="input" type="text" v-validate="'required'" placeholder="ingrédient" name="ingredient" id="ingredient" v-model="row.ingredient">
        </div>

        <div class="column is-marginless">
            <button type="button" class="button is-round is-small  is-primary "
                    @click="addRow()"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>


    </div>


</template>

<script>
    export default {
        data: function () {
            return {
                counter: 0,
                liste : [],

            };
        },
        methods:{
            addRow() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.counter++;
                        this.liste.push({ valeur: "" });
                    }
                    else {
                        return false;
                    }


                });


            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
