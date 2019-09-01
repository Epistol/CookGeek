<template>
    <div class="">
        <template v-for="(item, index) in liste">
            <div class="flex">
                <div class="w-3/12">
                    <input class="input_modal blck" type="text" v-model="item.qtt" ref="search"
                           placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]">
                </div>
                <div class="w-7/12">
                    <template v-if="index === liste.length - 1">
                        <input class="input_modal blck" type="text" v-model="item.name" @keyup.tab="addRow"
                               placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                        <!--                            TODO LATER : Add autocomplete-->
                    </template>
                    <template v-else>
                        <input class="input_modal blck" type="text" v-model="item.name"
                               placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                    </template>
                </div>
                <div class="w-2/12 is-flex-center " v-cloak v-if="index === liste.length -1">
                    <a @click="addRow()" class="button is-primary  is-small icon-delete">
                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <div class="w-2/12 is-flex-center" v-cloak v-if="index === liste.length -2 ">
                    <a @click="removeRow(index)" class="button is-small icon-delete">
                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import draggable from 'vuedraggable';

    export default {
        components: {
            draggable,
        },
        props: {
            ingredients: null,
        },
        mounted() {
            this.loadIngredients();
        },
        name: "ingredient_form",
        data: function () {
            return {
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
                this.liste.push({
                    name: '',
                    qtt: '',
                });
            },
            removeRow: function (index) {
                this.liste.splice(index, 1);
            },
            loadIngredients: function () {
                if (this.ingredients) {
                    this.liste = this.ingredients;
                }
            }
        },
    }
</script>
