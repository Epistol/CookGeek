<template>
    <div class="column">
        <template v-for="(item, index) in ingredients">
            <div class="columns">
                <div class="column is-3">
                    <input class="input_modal blck" type="text" v-model="item.qtt" ref="search"
                           placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]">
                </div>
                <div class="column is-7">
                    <template v-if="index === ingredients.length - 1">
                        <input class="input_modal blck" type="text" v-model="item.name" @keyup.tab="addRow()"
                               placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                    </template>
                    <template v-else>
                        <input class="input_modal blck" type="text" v-model="item.name"
                               placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                    </template>
                </div>


                    <template v-if="index === ingredients.length -1 ">
                        <div class="column is-1 is-flex-center " v-cloak >
                        <a @click="addRow()" class="button is-primary  is-small icon-delete">
                            <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </template>

                <div class="column is-1 is-flex-center " v-cloak >

                    <a @click="removeRow(index)" class="button is-small icon-delete">
                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                </div>
            </div>

        </template>
        <template v-for="(item, index) in removed">
                    <input class="input_modal blck" type="hidden" v-model="item.qtt" ref="search"
                           placeholder="Quantité" name="qtt_removed_ingredient[]" id="qtt_removed_ingredient[]">
                        <input class="input_modal blck" type="hidden" v-model="item.name"
                               placeholder="ingrédient" name="ingredient_removed[]" id="ingredient_removed[]">
        </template>

    </div>
</template>

<script>
	export default {
		props: ["recipe_id"],

		data: function() {
			return {
				counter: 0,
				ingredients:[{
					name: '',
					qtt: '',
				}],
				removed:[],
			};
		},
		methods: {
			addRow() {
				this.counter++;
				this.ingredients.push({
					name: '',
					qtt: '',
				});
			},

			removeRow: function(index) {
				this.counter--;
				this.removed.push({
					name: this.ingredients[index]['name'],
					qtt: this.ingredients[index]['qtt'],
				});
				this.ingredients.splice(index, 1);
			},

			 getIngredients() {
				axios.post('/api/recipe/get_ingredients/', {recipeid: this.recipe_id}).then(response => {
					if(response.data.length > 0){
						this.ingredients = response.data;
					}
					else {
						this.addRow();
					}
				});
			},
		},
		mounted() {
			this.getIngredients();
		},
	}
</script>
