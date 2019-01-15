<template>
    <div class="column">
        <draggable :options="{group:'people'}" @start="drag=true" @end="drag=false">
            <template v-for="(item, index) in liste">
                <div class="columns">
                    <div class="column is-3">
                        <input class="input_modal blck" type="text" v-model="item.qtt" ref="search"
                               placeholder="Quantité" name="qtt_ingredient[]" id="qtt_ingredient[]">
                    </div>
                    <div class="column is-7">
                        <template v-if="index === liste.length - 1">
                            <input class="input_modal blck" type="text" v-model="item.name" @keyup.tab="addRow"
                                   placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                        </template>
                        <template v-else>
                            <input class="input_modal blck" type="text" v-model="item.name"
                                   placeholder="ingrédient" name="ingredient[]" id="ingredient[]">
                        </template>


                    </div>

                    <div class="column is-3 is-flex-center " v-cloak v-if="index === liste.length -1">
                        <a @click="addRow()" class="button is-primary  is-small deleteicon">
                            <i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>

                    <div class="column is-3  is-flex-center " v-cloak v-if="index === liste.length -2 ">
                        <a @click="removeRow(index)" class="button is-small deleteicon">
                            <i class="fa fa-minus" aria-hidden="true"></i></a>
                    </div>
                </div>

            </template>
        </draggable>

    </div>
</template>

<script>
	import draggable from 'vuedraggable';

	export default {
		components: {
			draggable,
		},
		data: function() {
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

			removeRow: function(index) {
				this.liste.splice(index, 1);
			},
		},

	}
</script>
