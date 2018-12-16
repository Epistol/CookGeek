<template>
    <div class="column">
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

                <div class="column is-3 is-flex-center " v-cloak v-if="index === counter">
                    <a @click="addRow()" class="button is-primary  is-small deleteicon">
                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>

                <div class="column is-3  is-flex-center " v-cloak v-if="index === countminus">
                    <a @click="removeRow(index)" class="button is-small deleteicon">
                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                </div>
            </div>

        </template>

    </div>
</template>

<script>
	export default {
		data: function() {
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

			removeRow: function(index) {
				this.counter--;
				this.liste.splice(index, 1);
			},
		},
		mounted() {
			console.log('Component mounted.')
		},
		computed: {
			countminus: function() {
				return this.counter - 1;
			}
		},
		watch: {
			'liste': function() {
				// When the internal value changes, we $emit an event. Because this event is
				// named 'input', v-model will automatically update the parent value
				this.$emit('applicant', this.liste);
			}
		}
	}
</script>
