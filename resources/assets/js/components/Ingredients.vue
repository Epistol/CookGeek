<template>
    <div class="column">
        <template v-for="(item, index) in liste">
            <div class="columns">
                <div class="column is-3">
                    <input class="input_modal blck" type="text" v-validate="'required'" v-model="item.qtt"
                           placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]">
                </div>
                <div class="column is-7">
                    <input class="input_modal blck" type="text" v-validate="'required'" v-model="item.name"
                           placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                </div>

                <div class="column is-3 is-flex-center " v-cloak
                     v-if="index === counter">
                    <a @click="addRow()" class="button is-primary  is-small deleteicon">
                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <div class="column is-3  is-flex-center close-hover" v-cloak v-else="index > 0">
                    <a @click="removeRow(index)" class="button is-small deleteicon">
                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                </div>
            </div>

        </template>

    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                counter: 0,
                liste: [
                    {
                        name: '',
                        qtt: '',
                    }
                ],
            };
        },
        methods: {
            addRow() {
                this.counter++;
                this.liste.push({
                    name: '',
                    qtt: '',
                });
            },

            removeRow: function (index) {
                this.counter--;
                this.liste.splice(index, 1);
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
